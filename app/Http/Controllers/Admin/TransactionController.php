<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    if (request()->ajax()) {

      // dengan relasi
      $query = Transaction::with(['user']);

      return DataTables::of($query)
        ->addColumn('action', function ($item) {
          return '
          <div class="btn_group">
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                type="button" 
                data-toggle="dropdown">
                  Aksi
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="' . route('transaction.edit', $item->id) . '" >
                  Sunting
                </a>
                <form action="' . route('transaction.destroy', $item->id) . '" method="POST"> ' . method_field('delete') . csrf_field() . '
                  <button type="submit" class="dropdown-item text-danger">
                    Hapus
                  </button>
                </form>
              </div>
            </div>
          </div>
          ';
        })
        ->rawColumns(['action'])
        ->make();
    }

    return view('pages.admin.transaction.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    // Panggil itemnya
    $item = Transaction::findOrFail($id);


    return view('pages.admin.transaction.edit', [
      'item' => $item,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $data = $request->all();

    // Panggil transaction
    $item = Transaction::findOrFail($id);

    $item->update($data);

    // Redirect ke halaman
    return redirect()->route('transaction.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $item = Transaction::findOrFail($id);
    $item->delete();

    return redirect()->route('transaction.index');
  }
}
