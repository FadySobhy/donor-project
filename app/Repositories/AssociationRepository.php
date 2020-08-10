<?php


namespace App\Repositories;


use App\Models\Association;
use App\Models\Organizations;

class AssociationRepository
{
    public function allAssociations(){
        return Association::orderBy('id', 'DESC')
            ->join('donors', 'associations.donor_id', '=', 'donors.id')
            ->join('organizations', 'associations.organization_id', '=', 'organizations.id')
            ->join('organization_types', 'organizations.organization_type_id', '=', 'organization_types.id')
            ->join('association_relations', 'associations.donor_association_relation_id', '=', 'association_relations.id')
            ->select(
                'associations.id',
                'associations.slug',
                'associations.position_title',
                'associations.start_date',
                'associations.end_date',
                'associations.salary',
                'donors.first_name',
                'donors.last_name',
                'organizations.name as organization',
                'organization_types.name as type',
                'association_relations.name as relation'
            );
    }

    public function getAll(){

        $associations = $this->allAssociations();

        if (!empty(request('organization_type_ids')))
            foreach (request('organization_type_ids') as $organization_type_id) {
                $associations = $associations->orWhere('organizations.organization_type_id', $organization_type_id);
            }

        if (!empty(request('position_title')))
            $associations = $associations->where('position_title', request('position_title'));

        return $associations;
    }

    public function findAssociationBySlug($slug){
        return Association::where('slug', $slug)
            ->join('association_relations', 'associations.donor_association_relation_id', '=', 'association_relations.id')
            ->first();
    }

    public function getOrganizationsGroupedByType(){
        return Organizations::orderBy('organizations.organization_type_id')
            ->join('organization_types', 'organizations.organization_type_id', '=', 'organization_types.id')
            ->select(
                'organizations.id',
                'organizations.name',
                'organizations.organization_type_id',
                'organization_types.name as type'
                )
            ->get()
            ->groupBy('type');
    }
}
