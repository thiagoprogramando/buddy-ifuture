<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form extends Model {
    
    use HasFactory;

    protected $table = 'form';

    protected $fillable = [
        'id_creator',
        'cpf_or_cnpj_creator',
        'title',
        'description',
        'format',
        'spacing',
        'size',
        'margin',
        'table_or_form',
    ];
}
