<?php

namespace App\Http\Requests;

use App\Models\Association;
use App\Models\AssociationRelation;
use Illuminate\Foundation\Http\FormRequest;

class AssociationsStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'position_title'        => 'required|string|max:50',
            'start_date'            => 'nullable|date|date_format:Y-m-d|before_or_equal:today',
            'end_date'              => ['nullable', 'date', 'date_format:Y-m-d', 'before_or_equal:today', function ($attribute, $value, $fail) {
                if (!empty(request('start_date')) and !empty($value) and $value <= request('start_date')) {
                    $fail('End date must be greater than start date');
                }
            }],
            'salary'                => 'nullable|numeric',
            'relation'              => 'required|string|max:255',
            'donor_id'              => ['required', 'exists:donors,id'],
            'organization_id'       => ['required', 'exists:organizations,id'],
        ];
    }

    public function storeAssociation($request)
    {
        if (Association::where('donor_id', $this->donor_id)->where('organization_id', $this->organization_id)->get()->isEmpty()) {
            $data = $request->except('_token');

            $donorAssociationRelationId = $this->storeRelation(request('relation'));

            $association = new Association();
            $association->fill($data);
            $association->donor_association_relation_id = $donorAssociationRelationId;
            $association->save();

            return $this->response("success", "The Association has been saved successful");
        } else {
            return $this->response("error", "The Association created before");
        }
    }

    protected function storeRelation($name)
    {
        $associationRelation        = new AssociationRelation();
        $associationRelation->name  = $name;
        $associationRelation->save();

        return $associationRelation->id;
    }

    public function updateCurrentAssociation($request, $slug)
    {
        $data = $request->except('_token');

        $association = Association::where('slug', $slug)->first();
        if ($association) {
            AssociationRelation::where('id', $association->donor_association_relation_id)->update(['name' => request('relation')]);

            $association->fill($data);
            $association->save();

            return $this->response("success", "The Association has been saved successful");
        } else {
            return $this->response("error", "The Association Not Found");
        }
    }

    protected function response($status, $message)
    {
        return [
            "status" => $status,
            "message" => $message,
        ];
    }
}
