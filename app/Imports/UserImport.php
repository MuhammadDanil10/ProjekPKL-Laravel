<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
          'name' => $row[1],
          'role' => $row[2],
          'nisn' => $row[3],
          'password' => bcrypt($row[4]),
          'status' => $row[5],
        ]);
        
    }
}