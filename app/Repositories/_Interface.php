<?php

namespace App\Repositories;

interface _Interface
{
    public function find($opts = [], $one = false);

    public function save($opts = [], $check = false);

    public function create($opts = [], $check = false);

    public function update($opts = [], $values = []);

    public function remove($opts = []);
}