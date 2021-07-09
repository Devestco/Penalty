<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

class UserController extends MasterController
{
    public function __construct(User $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    public function ban($id): object
    {
        $user = $this->model->find($id);
        $user->update(
            [
                'banned' => 1,
            ]
        );
        $user->refresh();
        $user->refresh();
        return redirect()->back()->with('updated');
    }

    public function activate($id): object
    {
        $user = $this->model->find($id);
        $user->update(
            [
                'banned' => 0,
            ]
        );
        $user->refresh();
        $user->refresh();
        return redirect()->back()->with('updated');
    }

}
