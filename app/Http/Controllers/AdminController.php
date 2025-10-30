<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use IntlDateFormatter;

class AdminController extends Controller
{

    public function loginPage() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');            
        }

        return back()->withErrors([
            'email' => 'Email atau Password anda salah.',
        ]);
    }

    public function signUpPage() {
        return view('auth.signup');
    }

    public function signUp(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, Silahkan Login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function index()
    {
        $totalBarang = Product::count();
        $totalNilaiBarang = Product::sum('harga');

        $barangPerKategori = Product::select('kategori')
            ->selectRaw('COUNT(*) as total_per_kategori')
            ->groupBy('kategori')
            ->get();

        return view('dashboard.dashboard', compact('totalBarang', 'totalNilaiBarang', 'barangPerKategori'));
    }

    public function productIndex()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function productCreate()
    {
        return view('product.create');
    }

    public function productStore(Request $request)
    {
        $data = $request->validate([
            'kategori' => 'required|string|max:255',
            'produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:1',
            'thumbnail' => 'nullable',
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        Product::create($data);

        return redirect()->route('product.index')->with('success', 'Berhasil Menambahkan Produk');
    }

    public function productDelete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Berhasil Menghapus Produk');
    }

    public function productEdit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function productUpdate(Request $request, $id)
    {
        $data = $request->validate([
            'kategori' => 'required|string|max:255',
            'produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:1',
            'thumbnail' => 'nullable',
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $product = Product::findOrFail($id);
        $product->update($data);

        return redirect()->route('product.index')->with('success', 'Berhasil Mengupdate Produk!');
    }

    public function downloadReport()
    {

        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
        $formatter->setPattern('d MMMM yyyy');
        $formattedDate = $formatter->format(new \DateTime());

        $products = Product::all();

        $data = [
            'date' => $formattedDate,
            'products' => $products,
        ];

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('report.report', $data);

        return $pdf->download('product_report_' . $formattedDate . '.pdf');

    }
}
