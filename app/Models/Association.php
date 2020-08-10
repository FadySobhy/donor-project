<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    use Sluggable;

    protected $fillable = [
        'position_title',
        'start_date',
        'end_date',
        'salary',
        'donor_id',
        'organization_id',
        'donor_association_relation_id'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['position_title', 'organizations.name']
            ]
        ];
    }

    public function organizations()
    {
        return $this->belongsToMany(Organizations::class, "organization_id");
    }

    public function donors()
    {
        return $this->belongsToMany(Donor::class, "donor_id");
    }

    public function donor_association_relation()
    {
        return $this->belongsTo(AssociationRelation::class, "donor_association_relation_id");
    }
}
