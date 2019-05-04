<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $id_Etudiant
 * @property int $id_Matiere
 * @property int $id_Annee
 * @property string $nomJour
 * @property string $dateAbsence
 * @property string $seance
 * @property boolean $motif
 * @property boolean $appel
 * @property boolean $controle
 * @property Annee $annee
 * @property Etudiant $etudiant
 * @property Matiere $matiere
 */
class Absence extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'absence';

    /**
     * @var array
     */
    protected $fillable = ['id_Etudiant', 'id_Matiere', 'id_Annee', 'nomJour', 'dateAbsence', 'seance', 'motif', 'appel', 'controle'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function annee()
    {
        return $this->belongsTo('App\Annee', 'id_Annee');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function etudiant()
    {
        return $this->belongsTo('App\Etudiant', 'id_Etudiant', 'idEtudiant');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function matiere()
    {
        return $this->belongsTo('App\Matiere', 'id_Matiere');
    }
}
