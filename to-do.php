<php


1-Raw query

use Illuminate\Support\Facades\DB;
$cars = DB::select('select * from cars where id =?',[1]);
---------------------------------------------------------------

2-QueryBuilder

$cars = DB::table('cars')->where('id',1)->get();
$cars = DB::table('cars')->get();
$cars = DB::table('cars')->where('id',1)->get();

$cars = DB::table('cars')->select('body')->get();

$posts = DB::table('posts')->where('created_at','>',now())
->orWhere('id',1)
->get();


$posts = DB::table('posts')
->whereBetween('id',[2,3])
->get();

-- i hit the ground ban ban , my baby shut me


$posts =DB::table('posts')
->insert(
    [
        'title' => 'first tiele',
        'body'  => 'this is body'
        
    ]
  );

$posts=DB::table('posts')
->where('id',1)
->delete();

$posts=DB::table('posts')
->where('id',1)
->update([
        'title' => 'new title',
        'body'=> 'new body'
    ]);
---------------------------------------------------------------
3- Eloquent ORM

use App\Models\Car;

$cars=Car::create([
        'name' => 'new name',
        'title' => 'new title'
    ]);

    $cars=Car::create([
        'name' => $request->input('name'),
        'title' => $request ->input('title')
    ]);

    $cars = Car::find($id);

    $cars= Car::where('id',$id)
    ->update([
            'name' = $request->input('name')
        ]);

    
$cars = Car::find($id);
$cars->delete();





