<?php

namespace App\Traits;

/**
 * Usado como contrato para extender eloquent para aplicar query params y busqueda entre fechas a cada modelo
 * En el modelo debe existir allowedQueries array de string para limitar los atributos permitidos
 * o enviar atributos por parametros de funcion $fields
 * Para el filtrado de datos.
 */
trait Queryable
{
    /**
     * Aplica filtro where no inclusivo (AND) sobre el modelo
     * teniendo en cuenta allowedQueries
     *
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     *
     **/
    public function scopeApplyQueryParams($query, array $fields = [], string $operator = "like", bool $strict = false)
    {
        //si hay parametros en la query
        if (count(request()->query()) > 0) {
            $allowedQueries = $fields ?? $this->allowedQueries;
            //buscar entre atributos permitidos
            $query->where(function ($q) use ($allowedQueries, $operator, $strict) {
                foreach ($allowedQueries as $field) {
                    $attr = substr(request()->get($field), 0, 40) ??  '';
                    //chequea si el attributo tiene un valor valido o es un numero
                    if ($attr || is_numeric($attr)) {
                        $q = $strict ? $q->where($field, $operator, $attr) : $q->where($field, $operator, "%$attr%");
                    }
                }
            });
        }
        return $query;
    }

    /**
     * Pagina manteniendo los queries params de filtros
     * siempre aplicar a lo ultimo
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     *
     **/
    public function scopePaginateWithQuery($query, int $pages = 20)
    {
        //perform pagination
        $query = $query->paginate($pages);
        //maintain query params in pagination
        $query->appends(request()->query());
        return $query;
    }

    /**
     * Filtrar por fechas generico
     * el parametro debe existir como <nombre_campo>_start o <nombre_campo>_end
     *
     * @param String $field (name of the field for search)
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     *
     **/
    public function scopeBetweenDates($query, String $field)
    {
        $start = substr(request()->get($field . '_start'), 0, 10) ??  '';
        $end = substr(request()->get($field . '_end'), 0, 10) ??  '';
        if ($start)
            $query->whereDate($field, '>=', $start);
        if ($end)
            $query->whereDate($field, '<=', $end);
        return $query;
    }

    public function scopeDeleteFilter($query, string $field)
    {
        switch (request()->query($field)) {
            case 'all':
                $query->withTrashed();
                break;
            case 'deleted':
                $query->onlyTrashed();
        }
        return $query;
    }


    public function scopeIssetField($query, string $field)
    {
        switch (request()->query($field)) {
            case '1':
                $query->whereNotNull($field);
                break;
            case '0':
                $query->whereNull($field);
                break;
        }
        return $query;
    }
}