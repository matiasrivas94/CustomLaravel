<?php

namespace App\Traits;

/**
 * Usado como contrato para extender eloquent para aplicar busqueda generica inclusiva a cada modelo
 * En el modelo debe existir searchableAttrs array de string para limitar los atributos permitidos
 * Para la busqueda o pasar parametros por parametro de funcion.
 *  Se debe enviar como query param el attributo search con el contenido a buscar
 */
trait Searchable
{
    /**
     * Busqueda inclusiva por los campos agregados en allowedQueries
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     *
     **/
    public function scopeGenericSearch($query, array $fields = [])
    {
        $search = request()->search ? substr(request()->search, 0, 40) :  null;
        if ($search) {
            $searchableAttrs = $this->searchableAttrs ?? $fields;
            $query->where(function ($q) use ($search, $searchableAttrs) {
                foreach ($searchableAttrs as $field) {
                    $q->orWhere($field, 'like', "%$search%");
                }
            });
        }
        return $query;
    }
}
