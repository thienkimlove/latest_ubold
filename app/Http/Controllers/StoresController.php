<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\District;
use App\Models\Store;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Validator;

class StoresController extends Controller
{

    public function index()
    {
        return view('stores.index');
    }

    public function create()
    {
        return view('stores.create');
    }

    public function store(Request $request)
    {
        $validator = [
            'name' => 'required',
            'address' => 'required',
            'district_id' => 'required',
        ];

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {

            try {
                $file = $request->file('avatar');
                $name = str_slug($file->getClientOriginalName());
                $file->move(storage_path('logs'), $name);
                $lines = file(storage_path('logs/'.$name), FILE_IGNORE_NEW_LINES);

                $errorOnDistrict = null;

                $inserts = [];

                foreach ($lines as $line) {
                    if (strpos($line, '|') !== false) {
                        $lineStores = explode('|', $line);
                        if (count($lineStores) == 4) {
                            $district = District::where('slug', str_slug($lineStores[0]))->get();
                            if ($district->count() > 0) {
                                $districtId = $district->first()->id;
                                $inserts[] = [
                                    'name' => $lineStores[1],
                                    'address' => $lineStores[2],
                                    'phone' => $lineStores[3],
                                    'district_id' => $districtId
                                ];
                            } else {
                                $errorOnDistrict .= "\n".str_slug($lineStores[0]).' không trùng với slug nào trong bảng districts';
                            }
                        } else {
                            $errorOnDistrict .= "\n".'Thông tin '.$line. ' không đúng định dạng!';
                        }
                    } else {
                        $errorOnDistrict .= "\n".'Thông tin '.$line. ' không đúng định dạng!';
                    }
                }

                if (!$errorOnDistrict) {
                    foreach ($inserts as $insert) {
                        Store::create($insert);
                    }
                    flash()->success('Success','Thêm thành công '.count($inserts). ' records!');
                    return redirect()->route('stores.index');
                } else {
                    return redirect('stores/create?multi=1')
                        ->withErrors($errorOnDistrict)
                        ->withInput();
                }
            } catch (\Exception $e) {
                return redirect('stores/create?multi=1')
                    ->withErrors($e->getMessage())
                    ->withInput();
            }

        }

        $validator = Validator::make($request->all(), $validator);
        if ($validator->fails()) {
            return redirect('stores/create')
                ->withErrors($validator)
                ->withInput();
        }
        Store::create($request->all());

        flash()->success('Success!', 'Store successfully created.');

        return redirect()->route('stores.index');
    }

    public function edit($id)
    {
        $store = Store::find($id);

        if (! $store) {
            throw new ModelNotFoundException('Store not found.');
        }

        return view('stores.edit', compact('store'));
    }

    public function update(StoreRequest $request, $id)
    {
        $request->save($id);

        flash()->success('Thành công', 'Cập nhật thành công!');

        return redirect()->route('stores.index');
    }

    public function dataTables(Request $request)
    {
        return Store::getDatatables($request);
    }

}