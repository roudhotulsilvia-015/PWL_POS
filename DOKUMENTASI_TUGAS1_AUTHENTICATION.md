# TUGAS 1 - IMPLEMENTASI AUTHENTICATION

## 📋 RINGKASAN

Implementasi sistem login dan logout di Laravel PWL_POS menggunakan AdminLTE template.

---

## 1️⃣ PROSES LOGIN

### **Tahapan:**
1. User input username & password di form login
2. Form submit via AJAX ke POST `/login`
3. Controller cari user di database `m_user` berdasarkan username
4. Verifikasi password dengan `Hash::check()`
5. Jika cocok → Buat session dengan `Auth::login()` → Redirect ke dashboard
6. Jika tidak cocok → Tampilkan error message

### **File yang Diubah:**
- `app/Http/Controllers/AuthController.php` - Tambah method `login()` dan `postlogin()`
- `resources/views/auth/login.blade.php` - Form login dengan AJAX
- `routes/web.php` - Route GET `/login` dan POST `/login`
- `app/Models/UserModel.php` - Extend `Authenticatable` interface
- `config/auth.php` - Set provider ke `UserModel`

### **Test Credentials:**
- Username: `admin`
- Password: `admin123`

---

## 2️⃣ PROSES LOGOUT

### **Tahapan:**
1. User klik user dropdown di navbar (atas kanan)
2. Klik "Logout"
3. GET `/logout` dipanggil
4. `Auth::logout()` menghapus session
5. Redirect ke halaman login

### **File yang Diubah:**
- `app/Http/Controllers/AuthController.php` - Tambah method `logout()`
- `resources/views/layouts/header.blade.php` - Tambah user dropdown dengan logout button
- `routes/web.php` - Route GET `/logout` (protected by middleware auth)

---

## 🔐 PENJELASAN AUTENTIKASI & OTORISASI

### **Authentication (Autentikasi) = Verifikasi Identitas**
- User input username + password
- Sistem cek kecocokan di database
- Password dibandingkan dengan hash menggunakan `Hash::check()`
- Jika valid → Session dibuat

**Kode:**
```php
$user = UserModel::where('username', $username)->first();
if($user && Hash::check($password, $user->password)) {
    Auth::login($user);  // Buat session
}
```

### **Authorization (Otorisasi) = Pengecekan Hak Akses**
- Route tertentu hanya bisa diakses jika sudah login
- Menggunakan middleware `auth`
- Jika belum login → Redirect ke `/login`

**Kode:**
```php
Route::middleware(['auth'])->group(function () {
    Route::get('/', [WelcomeController::class, 'index']);
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout']);
});
```

---

## 📁 FILE YANG DIMODIFIKASI

| File | Perubahan |
|------|-----------|
| `AuthController.php` | Tambah login(), postlogin(), logout() |
| `login.blade.php` | Form login AJAX |
| `header.blade.php` | User dropdown + logout button |
| `routes/web.php` | Route login/logout |
| `UserModel.php` | Extend Authenticatable |
| `config/auth.php` | Set UserModel sebagai provider |

---

## ✅ FITUR YANG BERFUNGSI

✅ Login dengan username & password  
✅ Verifikasi password dengan bcrypt  
✅ Session management  
✅ Logout menghapus session  
✅ Protected routes (middleware auth)  
✅ User info tampil di navbar  
✅ Error handling dengan SweetAlert2  

---

## 🧪 TESTING

**Test Login:**
1. Buka `http://localhost/pwl_pos/public/login`
2. Input: username=`admin`, password=`admin123`
3. Klik "Sign In" → Masuk ke dashboard ✓

**Test Logout:**
1. Klik user dropdown (atas kanan)
2. Klik "Logout"
3. Redirect ke login page ✓

**Test Protected Route:**
1. Logout terlebih dahulu
2. Coba akses `http://localhost/pwl_pos/public/user`
3. Akan redirect ke login (route protected) ✓

---

## ✨ SELESAI

Semua requirement Tugas 1 sudah diimplementasikan dan ditest dengan baik.

