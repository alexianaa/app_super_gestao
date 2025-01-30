1. all()
2. find(id)
3. where('coluna','operador','elemento de comparação')
4. whereIn('coluna',[conjunto de elementos de comparação])
5. whereColumn -> compara os valores da mesma linha em diferentes colunas -> whereColumn('renda_total','<>','per_capta')
6. Precedencia em operações lógicas:

SiteContato::where(function($query){ $query->where('nome','=','jorge')->orWhere('nome','=','ana'); })
->where(function($query){ $query->whereIn('motivo_contato',[1,3])->orWhereBetween('id',[4,6]); })->get();

> ->get() vai de Builder para Collection

> create::([])

> use App\Models\Fornecedor

## Funções de Collections

> https://laravel.com/docs/11.x/collections

1. first
2. last
3. reverse
4. toArray
5. toJson
6. pluck('email')
7. fill e save

-   $fornecedor->fill(['nome'=>'Fornecedor2','site'=>'fornecedor2.com.br','email'=>'fornecedor2@gmail.com']);
-   $fornecedor->save();

8. update

-   Fornecedor::whereIn('id',[1,2])->update(['nome' => 'Fornecedor teste','site' => 'teste.com.br']);

9. delete (builder) ou destroy (entidade)
10. softDelete

-   forceDelete()
-   withTrashed()
-   onlyTrashed() ou withTrashed()
-   restore() ou $fornecedores[0]->restore()
