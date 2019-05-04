<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $idEtudiant
 * @property string $cin
 * @property string $prenom
 * @property string $nom
 * @property string $sexe
 * @property string $dateNaissance
 * @property int $idNationalite
 * @property string $lieuNaissance
 * @property string $email
 * @property string $telephone
 * @property string $imagePath
 * @property string $cne
 * @property string $dateInscription
 * @property string $provenance
 * @property int $idFiliere
 * @property int $idNiveau
 * @property int $idScolarite
 * @property int $idParentInfo
 * @property int $idGroupe
 * @property Filiere $filiere
 * @property Groupe $groupe
 * @property Nationalite $nationalite
 * @property Niveau $niveau
 * @property Parentinfo $parentinfo
 * @property Scolarite $scolarite
 * @property Absence[] $absences
 * @property Attestationreussite[] $attestationreussites
 * @property Attestationscolarite[] $attestationscolarites
 * @property Document[] $documents
 * @property Ficheinscription[] $ficheinscriptions
 * @property Lettrerecommandation[] $lettrerecommandations
 */
class Etudiant extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'etudiant';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idEtudiant';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['cin', 'prenom', 'nom', 'sexe', 'dateNaissance', 'idNationalite', 'lieuNaissance', 'email', 'telephone', 'imagePath', 'cne', 'dateInscription', 'provenance', 'idFiliere', 'idNiveau', 'idScolarite', 'idParentInfo', 'idGroupe'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function filiere()
    {
        return $this->belongsTo('App\Filiere', 'idFiliere');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function groupe()
    {
        return $this->belongsTo('App\Groupe', 'idGroupe', 'idGroupe');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nationalite()
    {
        return $this->belongsTo('App\Nationalite', 'idNationalite');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function niveau()
    {
        return $this->belongsTo('App\Niveau', 'idNiveau', 'idNiveau');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentinfo()
    {
        return $this->belongsTo('App\Parentinfo', 'idParentInfo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function scolarite()
    {
        return $this->belongsTo('App\Scolarite', 'idScolarite');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function absences()
    {
        return $this->hasMany('App\Absence', 'id_Etudiant', 'idEtudiant');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attestationreussites()
    {
        return $this->hasMany('App\Attestationreussite', 'id_E', 'idEtudiant');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attestationscolarites()
    {
        return $this->hasMany('App\Attestationscolarite', 'id_Et', 'idEtudiant');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function documents()
    {
        return $this->belongsToMany('App\Document', 'etudiant_document', 'etudiant_idEtudiant', 'documents_idDocument');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ficheinscriptions()
    {
        return $this->hasMany('App\Ficheinscription', 'id_Etud', 'idEtudiant');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lettrerecommandations()
    {
        return $this->hasMany('App\Lettrerecommandation', 'id_Etu', 'idEtudiant');
    }
}
