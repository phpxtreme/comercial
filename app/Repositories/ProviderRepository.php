<?php

namespace App\Repositories;

use App\Models\Provider;

class ProviderRepository extends _Base implements _Interface
{
    public function find($opts = [], $one = false)
    {
        $model = new Provider();

        foreach ($opts as $field => $value) {
            $model = $model->where([$field => $value]);
        }

        return $one ? $model->first() : $model;
    }

    public function save($opts = [], $check = false)
    {
        $model = new Provider();

        if ($check) {
            if ($this->find($opts, true)) {
                return false;
            }
        }

        foreach ($opts as $key => $value) {
            $model->$key = $value;
        }

        return $model->save() ? true : false;
    }

    public function create($opts = [], $check = false)
    {
        if ($check) {
            if ($this->find($opts, true)) {
                return false;
            }
        }

        return Provider::create($opts);
    }

    public function remove($opts = [])
    {
        if (!$this->find($opts, true)) {
            return false;
        }

        return Provider::where($opts)->delete() ? true : false;
    }

    public function update($opts = [], $values = [])
    {
        if (!$this->find($opts)) {
            return false;
        }

        return Provider::where($opts)->update($values) ? true : false;
    }
}