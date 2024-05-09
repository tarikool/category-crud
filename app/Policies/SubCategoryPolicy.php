<?php

namespace App\Policies;

use App\Models\SubCategory;
use App\Models\Permission;
use App\Models\User;

class SubCategoryPolicy
{
    private $tag;

    public function __construct(){
        $this->tag = SubCategory::TAG;
    }

    public function viewAny(User $user): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_view"])->exists();
    }

    public function view(User $user, SubCategory $subCategory): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_view"])->exists();
    }

    public function create(User $user): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_create"])->exists();
    }

    public function update(User $user, SubCategory $subCategory): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_update"])->exists();
    }

    public function delete(User $user, SubCategory $subCategory): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_delete"])->exists();
    }

}
