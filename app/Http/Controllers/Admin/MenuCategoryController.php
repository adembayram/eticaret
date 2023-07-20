<?php 


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


/**
 * 
 */
class MenuCategoryController extends Controller
{
	


	public function index(){

		$menus = Menu::paginate(10);

		return view('admin.menu-category.index',compact('menus'));

	}

	public function create(){

		return view('admin.menu-category.create');

	}


	public function store(Request $request){


		$insert = Menu::create([
			'name' => $request->name
		]);

		if($insert){

			return redirect()->route('menu-category.index')->withSuccess('İşlem Başarılı Bir Şekilde Gerçekleştirildi.');

		}else{

			return redirect()->route('basecategory.index')->withError('İşlem Başarısız. Lütfen Tekrar Deneyiniz.');

		}


	}


	public function edit($id){


		$menu = Menu::find($id) ?? abort(404,'Menü Bulunamadı!');

		return view('admin.menu-category.edit',compact('menu'));


	}



	public function update(Request $request, $id){


		$menu = Menu::find($id) ?? abort(404,'Menu Bulunamadı!');

		$menuUpdate = $menu->where('id',$id)->update([

			'name' => $request->name

		]);


		if($menuUpdate){

			return redirect()->route('menu-category.index')->withSuccess('İşlem Başarılı Bir Şekilde Gerçekleştirildi.');

		}else{

			return redirect()->route('basecategory.index')->withError('İşlem Başarısız. Lütfen Tekrar Deneyiniz.');

		}

	}


	public function destroy($id){


		$menu = Menu::find($id) ?? abort(404,'Menü Bulunamadı!');
		$menu->delete();
		return redirect()->route('menu-category.index')->withSuccess('İşlem Başarılı Bir Şekilde Gerçekleştirildi.');		


	}



}

