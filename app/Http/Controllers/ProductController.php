<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Tampilkan seluruh data yang ada di database
     */
    public function index(Request $request): View
    {
        $status = $request->query('status', 'all'); //Ambil data dari query params dengan default 'all'
        $search = $request->query('search'); //Ambil data dari query params

        $products = Product::query() //Buat query
            ->when($status === 'in_stock', fn ($query) => $query->where('stock', '>', 0))
            ->when($status === 'out_of_stock', fn ($query) => $query->where('stock', '=', 0))
            ->when($search, fn ($query) => $query->where('name', 'like', "%{$search}%"))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('products.index', compact('products', 'status'));
    }

    /**
     * Buka halaman create (Form tambah produk)
     */

    public function create(){
        return view('products.create');
    }

    /**
     * Simpan produk yang baru ke database
     */
    public function store(Request $request)
    {
        //Validasi data yang masuk
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ],[ //Custom pesan error
            'name.required' => 'Nama Produk harus diisi',
            'name.max' => 'Nama produk maksimal 100 karakter',
            'price.required' => 'Harga harus diisi',
            'price.numeric' => 'Harga harus berupa angka',
            'stock.required' => 'Stock harus diisi',
            'stock.integer' => 'Stock harus berupa angka'
        ]);

        //Simpan data ke database
        Product::create($validated);

        //Redirect ke halaman index
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Ambil data berdasarkan ID
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    /**
     * Buka halaman edit (Form edit produk)
     */
    public function edit(Product $product){
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Cari data berdasarkan ID
        $product = Product::findOrFail($id);

        //Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ],[ //Custom pesan error
            'name.required' => 'Nama Produk harus diisi',
            'name.max' => 'Nama produk maksimal 100 karakter',
            'price.required' => 'Harga harus diisi',
            'price.numeric' => 'Harga harus berupa angka',
            'stock.required' => 'Stock harus diisi',
            'stock.integer' => 'Stock harus berupa angka'
        ]);

        //Updata data
        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate');
    }

    /**
     * Hapus data berdasarkan ID
     */
    public function destroy(string $id)
    {
        //Cari data berdasarkan ID
        $product = Product::findOrFail($id);
        //Hapus data
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }
}
