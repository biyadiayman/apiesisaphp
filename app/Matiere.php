<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nom
 * @property int $id_Filiere
 * @property int $id_Niveau
 * @property Filiere $filiere
 * @property Niveau $niveau
 * @property Absence[] $absences
 */
class Matiere extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'matiere';

    /**
     * @var array
     */
    protected $fillable = ['nom', 'id_Filiere', 'id_Niveau'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function filiere()
    {
        return $this->belongsTo('App\Filiere', 'id_Filiere');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function niveau()
    {
        return $this->belongsTo('App\Niveau', 'id_Niveau', 'idNiveau');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function absences()
    {
        return $this->hasMany('App\Absence', 'id_Matiere');
    }
}
