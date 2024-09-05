<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Random;

class MenuController extends Controller
{
    function index(Request $req)
    {
        $builder = Menu::where('merchant_id', Auth::user()->merchant->id);

        if ($q = $req->q) {
            $builder = $builder->where(function ($query) use ($q) {
                return $query->where('name', 'like', "%$q%");
            });
        }

        if ($req->category) {
            $builder = $builder->where('category_id', $req->category);
        }

        $menus = $builder->paginate(10)->withQueryString();
        $categories = MenuCategory::all();

        return view('merchant.menu.index', compact('menus', 'categories'));
    }

    function store(Request $req)
    {
        $data = $this->validate($req);
        $data['merchant_id'] = Auth::user()->merchant->id;

        if ($photo = $req->file('photo')) {
            $randomName = Random::generate(16) . '.jpg';
            $photo->storeAs('/menus', $randomName, 'publics');
            $data['photo'] = $randomName;
        } else {
            unset($data['photo']);
        }

        Menu::create($data);

        return redirect()->back()->with('success', 'Data menu berhasil ditambah');
    }

    function update(Request $req, $id)
    {
        $data = $this->validate($req);
        $menu = Menu::find($id);

        if ($photo = $req->file('photo')) {
            $randomName = Random::generate(16) . '.jpg';
            $photo->storeAs('/menus', $randomName, 'publics');
            $data['photo'] = $randomName;

            Storage::disk('publics')->delete('/menus/' . $menu->photo);
        } else {
            unset($data['photo']);
        }

        $menu->update($data);

        return redirect()->back()->with('success', 'Data menu berhasil diedit');
    }

    function destroy($id)
    {
        $menu = Menu::find($id);

        Storage::disk('publics')->delete('/menus/' . $menu->photo);

        OrderDetail::where('menu_id', $menu->id)->delete();
        $menu->delete();

        return redirect()->back()->with('success', 'Data menu berhasil dihapus');
    }

    private function validate(Request $req)
    {
        return $req->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'photo' => 'nullable',
            'category_id' => 'required|integer',
        ]);
    }
}
