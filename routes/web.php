<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GiftController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RsvpController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\ReplyRsvpController;
use App\Http\Controllers\Admin\FiturController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\StoryController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\user\WelcomeController;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TestimonyController;
use App\Http\Controllers\user\InvitationController;
use App\Http\Controllers\user\OrderController as UserOrderController;
use App\Http\Controllers\Admin\BridegroomController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\GiftPaymentController;
use App\Http\Controllers\Admin\WeddingDataController;
use App\Http\Controllers\Admin\InvitedGuestController;
use App\Http\Controllers\Admin\FiturCategoryController;
use App\Http\Controllers\Admin\WeddingCeremonyController;
use App\Http\Controllers\Admin\WeddingReceptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// !ADMIN ROUTES
Route::prefix('/super/admin')->group(function () {
    Auth::routes();
});

Route::prefix('/super/admin')
    ->middleware(['auth', 'superAdmin'])
    ->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::get('users', [UserController::class, 'index'])->name(
            'users.index'
        );
        Route::post('users', [UserController::class, 'store'])->name(
            'users.store'
        );
        Route::get('users/create', [UserController::class, 'create'])->name(
            'users.create'
        );
        Route::get('users/{user}', [UserController::class, 'show'])->name(
            'users.show'
        );
        Route::get('users/{user}/edit', [UserController::class, 'edit'])->name(
            'users.edit'
        );
        Route::put('users/{user}', [UserController::class, 'update'])->name(
            'users.update'
        );
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name(
            'users.destroy'
        );

        Route::get('album', [AlbumController::class, 'index'])->name(
            'albums.index'
        );
        Route::post('album', [AlbumController::class, 'store'])->name(
            'albums.store'
        );
        Route::get('album/create', [AlbumController::class, 'create'])->name(
            'albums.create'
        );
        Route::get('album/{album}', [AlbumController::class, 'show'])->name(
            'albums.show'
        );
        Route::get('album/{album}/edit', [
            AlbumController::class,
            'edit',
        ])->name('albums.edit');
        Route::put('album/{album}', [AlbumController::class, 'update'])->name(
            'albums.update'
        );
        Route::delete('album/{album}', [
            AlbumController::class,
            'destroy',
        ])->name('albums.destroy');

        Route::get('mempelai', [BridegroomController::class, 'index'])->name(
            'bridegrooms.index'
        );
        Route::post('mempelai', [BridegroomController::class, 'store'])->name(
            'bridegrooms.store'
        );
        Route::get('mempelai/create', [
            BridegroomController::class,
            'create',
        ])->name('bridegrooms.create');
        Route::get('mempelai/{bridegroom}', [
            BridegroomController::class,
            'show',
        ])->name('bridegrooms.show');
        Route::get('mempelai/{bridegroom}/edit', [
            BridegroomController::class,
            'edit',
        ])->name('bridegrooms.edit');
        Route::put('mempelai/{bridegroom}', [
            BridegroomController::class,
            'update',
        ])->name('bridegrooms.update');
        Route::delete('mempelai/{bridegroom}', [
            BridegroomController::class,
            'destroy',
        ])->name('bridegrooms.destroy');

        Route::get('order', [OrderController::class, 'index'])->name(
            'orders.index'
        );
        Route::post('order', [OrderController::class, 'store'])->name(
            'orders.store'
        );
        Route::get('order/create', [OrderController::class, 'create'])->name(
            'orders.create'
        );
        Route::get('order/{order}', [OrderController::class, 'show'])->name(
            'orders.show'
        );
        Route::get('order/{order}/edit', [
            OrderController::class,
            'edit',
        ])->name('orders.edit');
        Route::put('order/{order}', [OrderController::class, 'update'])->name(
            'orders.update'
        );
        Route::delete('order/{order}', [
            OrderController::class,
            'destroy',
        ])->name('orders.destroy');

        Route::get('pengunjung', [VisitorController::class, 'index'])->name(
            'visitors.index'
        );
        Route::post('pengunjung', [VisitorController::class, 'store'])->name(
            'visitors.store'
        );
        Route::get('pengunjung/create', [
            VisitorController::class,
            'create',
        ])->name('visitors.create');
        Route::get('pengunjung/{visitor}', [
            VisitorController::class,
            'show',
        ])->name('visitors.show');
        Route::get('pengunjung/{visitor}/edit', [
            VisitorController::class,
            'edit',
        ])->name('visitors.edit');
        Route::put('pengunjung/{visitor}', [
            VisitorController::class,
            'update',
        ])->name('visitors.update');
        Route::delete('pengunjung/{visitor}', [
            VisitorController::class,
            'destroy',
        ])->name('visitors.destroy');

        Route::get('fitur', [FiturController::class, 'index'])->name(
            'fiturs.index'
        );
        Route::post('fitur', [FiturController::class, 'store'])->name(
            'fiturs.store'
        );
        Route::get('fitur/create', [FiturController::class, 'create'])->name(
            'fiturs.create'
        );
        Route::get('fitur/{fitur}', [FiturController::class, 'show'])->name(
            'fiturs.show'
        );
        Route::get('fitur/{fitur}/edit', [
            FiturController::class,
            'edit',
        ])->name('fiturs.edit');
        Route::put('fitur/{fitur}', [FiturController::class, 'update'])->name(
            'fiturs.update'
        );
        Route::delete('fitur/{fitur}', [
            FiturController::class,
            'destroy',
        ])->name('fiturs.destroy');

        Route::get('pertanyaan', [FaqController::class, 'index'])->name(
            'faqs.index'
        );
        Route::post('pertanyaan', [FaqController::class, 'store'])->name(
            'faqs.store'
        );
        Route::get('pertanyaan/create', [FaqController::class, 'create'])->name(
            'faqs.create'
        );
        Route::get('pertanyaan/{faq}', [FaqController::class, 'show'])->name(
            'faqs.show'
        );
        Route::get('pertanyaan/{faq}/edit', [
            FaqController::class,
            'edit',
        ])->name('faqs.edit');
        Route::put('pertanyaan/{faq}', [FaqController::class, 'update'])->name(
            'faqs.update'
        );
        Route::delete('pertanyaan/{faq}', [
            FaqController::class,
            'destroy',
        ])->name('faqs.destroy');

        Route::get('testimoni', [TestimonyController::class, 'index'])->name(
            'testimonies.index'
        );
        Route::post('testimoni', [TestimonyController::class, 'store'])->name(
            'testimonies.store'
        );
        Route::get('testimoni/create', [
            TestimonyController::class,
            'create',
        ])->name('testimonies.create');
        Route::get('testimoni/{testimony}', [
            TestimonyController::class,
            'show',
        ])->name('testimonies.show');
        Route::get('testimoni/{testimony}/edit', [
            TestimonyController::class,
            'edit',
        ])->name('testimonies.edit');
        Route::put('testimoni/{testimony}', [
            TestimonyController::class,
            'update',
        ])->name('testimonies.update');
        Route::delete('testimoni/{testimony}', [
            TestimonyController::class,
            'destroy',
        ])->name('testimonies.destroy');

        Route::get('fitur-kategori', [
            FiturCategoryController::class,
            'index',
        ])->name('fitur-categories.index');
        Route::post('fitur-kategori', [
            FiturCategoryController::class,
            'store',
        ])->name('fitur-categories.store');
        Route::get('fitur-kategori/create', [
            FiturCategoryController::class,
            'create',
        ])->name('fitur-categories.create');
        Route::get('fitur-kategori/{fiturCategory}', [
            FiturCategoryController::class,
            'show',
        ])->name('fitur-categories.show');
        Route::get('fitur-kategori/{fiturCategory}/edit', [
            FiturCategoryController::class,
            'edit',
        ])->name('fitur-categories.edit');
        Route::put('fitur-kategori/{fiturCategory}', [
            FiturCategoryController::class,
            'update',
        ])->name('fitur-categories.update');
        Route::delete('fitur-kategori/{fiturCategory}', [
            FiturCategoryController::class,
            'destroy',
        ])->name('fitur-categories.destroy');

        Route::get('pembayaran-hadiah', [
            GiftPaymentController::class,
            'index',
        ])->name('gift-payments.index');
        Route::post('pembayaran-hadiah', [
            GiftPaymentController::class,
            'store',
        ])->name('gift-payments.store');
        Route::get('pembayaran-hadiah/create', [
            GiftPaymentController::class,
            'create',
        ])->name('gift-payments.create');
        Route::get('pembayaran-hadiah/{giftPayment}', [
            GiftPaymentController::class,
            'show',
        ])->name('gift-payments.show');
        Route::get('pembayaran-hadiah/{giftPayment}/edit', [
            GiftPaymentController::class,
            'edit',
        ])->name('gift-payments.edit');
        Route::put('pembayaran-hadiah/{giftPayment}', [
            GiftPaymentController::class,
            'update',
        ])->name('gift-payments.update');
        Route::delete('pembayaran-hadiah/{giftPayment}', [
            GiftPaymentController::class,
            'destroy',
        ])->name('gift-payments.destroy');

        Route::get('tamu-undangan', [
            InvitedGuestController::class,
            'index',
        ])->name('invited-guests.index');
        Route::post('tamu-undangan', [
            InvitedGuestController::class,
            'store',
        ])->name('invited-guests.store');
        Route::get('tamu-undangan/create', [
            InvitedGuestController::class,
            'create',
        ])->name('invited-guests.create');
        Route::get('tamu-undangan/{invitedGuest}', [
            InvitedGuestController::class,
            'show',
        ])->name('invited-guests.show');
        Route::get('tamu-undangan/{invitedGuest}/edit', [
            InvitedGuestController::class,
            'edit',
        ])->name('invited-guests.edit');
        Route::put('tamu-undangan/{invitedGuest}', [
            InvitedGuestController::class,
            'update',
        ])->name('invited-guests.update');
        Route::delete('tamu-undangan/{invitedGuest}', [
            InvitedGuestController::class,
            'destroy',
        ])->name('invited-guests.destroy');

        Route::get('cerita-cinta', [StoryController::class, 'index'])->name(
            'stories.index'
        );
        Route::post('cerita-cinta', [StoryController::class, 'store'])->name(
            'stories.store'
        );
        Route::get('cerita-cinta/create', [
            StoryController::class,
            'create',
        ])->name('stories.create');
        Route::get('cerita-cinta/{story}', [
            StoryController::class,
            'show',
        ])->name('stories.show');
        Route::get('cerita-cinta/{story}/edit', [
            StoryController::class,
            'edit',
        ])->name('stories.edit');
        Route::put('cerita-cinta/{story}', [
            StoryController::class,
            'update',
        ])->name('stories.update');
        Route::delete('cerita-cinta/{story}', [
            StoryController::class,
            'destroy',
        ])->name('stories.destroy');

        Route::get('data-website', [WebsiteController::class, 'index'])->name(
            'websites.index'
        );
        Route::post('data-website', [WebsiteController::class, 'store'])->name(
            'websites.store'
        );
        Route::get('data-website/create', [
            WebsiteController::class,
            'create',
        ])->name('websites.create');
        Route::get('data-website/{website}', [
            WebsiteController::class,
            'show',
        ])->name('websites.show');
        Route::get('data-website/{website}/edit', [
            WebsiteController::class,
            'edit',
        ])->name('websites.edit');
        Route::put('data-website/{website}', [
            WebsiteController::class,
            'update',
        ])->name('websites.update');
        Route::delete('data-website/{website}', [
            WebsiteController::class,
            'destroy',
        ])->name('websites.destroy');

        Route::get('rsvp', [RsvpController::class, 'index'])->name(
            'rsvps.index'
        );
        Route::post('rsvp', [RsvpController::class, 'store'])->name(
            'rsvps.store'
        );
        Route::get('rsvp/create', [RsvpController::class, 'create'])->name(
            'rsvps.create'
        );
        Route::get('rsvp/{rsvp}', [RsvpController::class, 'show'])->name(
            'rsvps.show'
        );
        Route::get('rsvp/{rsvp}/edit', [RsvpController::class, 'edit'])->name(
            'rsvps.edit'
        );
        Route::put('rsvp/{rsvp}', [RsvpController::class, 'update'])->name(
            'rsvps.update'
        );
        Route::delete('rsvp/{rsvp}', [RsvpController::class, 'destroy'])->name(
            'rsvps.destroy'
        );

        Route::get('kategori', [CategoryController::class, 'index'])->name(
            'categories.index'
        );
        Route::post('kategori', [CategoryController::class, 'store'])->name(
            'categories.store'
        );
        Route::get('kategori/create', [
            CategoryController::class,
            'create',
        ])->name('categories.create');
        Route::get('kategori/{category}', [
            CategoryController::class,
            'show',
        ])->name('categories.show');
        Route::get('kategori/{category}/edit', [
            CategoryController::class,
            'edit',
        ])->name('categories.edit');
        Route::put('kategori/{category}', [
            CategoryController::class,
            'update',
        ])->name('categories.update');
        Route::delete('kategori/{category}', [
            CategoryController::class,
            'destroy',
        ])->name('categories.destroy');

        Route::get('data-resepsi', [
            WeddingReceptionController::class,
            'index',
        ])->name('wedding-receptions.index');
        Route::post('data-resepsi', [
            WeddingReceptionController::class,
            'store',
        ])->name('wedding-receptions.store');
        Route::get('data-resepsi/create', [
            WeddingReceptionController::class,
            'create',
        ])->name('wedding-receptions.create');
        Route::get('data-resepsi/{weddingReception}', [
            WeddingReceptionController::class,
            'show',
        ])->name('wedding-receptions.show');
        Route::get('data-resepsi/{weddingReception}/edit', [
            WeddingReceptionController::class,
            'edit',
        ])->name('wedding-receptions.edit');
        Route::put('data-resepsi/{weddingReception}', [
            WeddingReceptionController::class,
            'update',
        ])->name('wedding-receptions.update');
        Route::delete('data-resepsi/{weddingReception}', [
            WeddingReceptionController::class,
            'destroy',
        ])->name('wedding-receptions.destroy');

        Route::get('data-akad-nikah', [
            WeddingCeremonyController::class,
            'index',
        ])->name('wedding-ceremonies.index');
        Route::post('data-akad-nikah', [
            WeddingCeremonyController::class,
            'store',
        ])->name('wedding-ceremonies.store');
        Route::get('data-akad-nikah/create', [
            WeddingCeremonyController::class,
            'create',
        ])->name('wedding-ceremonies.create');
        Route::get('data-akad-nikah/{weddingCeremony}', [
            WeddingCeremonyController::class,
            'show',
        ])->name('wedding-ceremonies.show');
        Route::get('data-akad-nikah/{weddingCeremony}/edit', [
            WeddingCeremonyController::class,
            'edit',
        ])->name('wedding-ceremonies.edit');
        Route::put('data-akad-nikah/{weddingCeremony}', [
            WeddingCeremonyController::class,
            'update',
        ])->name('wedding-ceremonies.update');
        Route::delete('data-akad-nikah/{weddingCeremony}', [
            WeddingCeremonyController::class,
            'destroy',
        ])->name('wedding-ceremonies.destroy');

        Route::get('data-pernikahan', [
            WeddingDataController::class,
            'index',
        ])->name('all-wedding-data.index');
        Route::post('data-pernikahan', [
            WeddingDataController::class,
            'store',
        ])->name('all-wedding-data.store');
        Route::get('data-pernikahan/create', [
            WeddingDataController::class,
            'create',
        ])->name('all-wedding-data.create');
        Route::get('data-pernikahan/{weddingData}', [
            WeddingDataController::class,
            'show',
        ])->name('all-wedding-data.show');
        Route::get('data-pernikahan/{weddingData}/edit', [
            WeddingDataController::class,
            'edit',
        ])->name('all-wedding-data.edit');
        Route::put('data-pernikahan/{weddingData}', [
            WeddingDataController::class,
            'update',
        ])->name('all-wedding-data.update');
        Route::delete('data-pernikahan/{weddingData}', [
            WeddingDataController::class,
            'destroy',
        ])->name('all-wedding-data.destroy');

        Route::get('data-hadiah', [GiftController::class, 'index'])->name(
            'gifts.index'
        );
        Route::post('data-hadiah', [GiftController::class, 'store'])->name(
            'gifts.store'
        );
        Route::get('data-hadiah/create', [
            GiftController::class,
            'create',
        ])->name('gifts.create');
        Route::get('data-hadiah/{gift}', [GiftController::class, 'show'])->name(
            'gifts.show'
        );
        Route::get('data-hadiah/{gift}/edit', [
            GiftController::class,
            'edit',
        ])->name('gifts.edit');
        Route::put('data-hadiah/{gift}', [
            GiftController::class,
            'update',
        ])->name('gifts.update');
        Route::delete('data-hadiah/{gift}', [
            GiftController::class,
            'destroy',
        ])->name('gifts.destroy');

        Route::get('tema', [ThemeController::class, 'index'])->name(
            'themes.index'
        );
        Route::post('tema', [ThemeController::class, 'store'])->name(
            'themes.store'
        );
        Route::get('tema/create', [ThemeController::class, 'create'])->name(
            'themes.create'
        );
        Route::get('tema/{theme}', [ThemeController::class, 'show'])->name(
            'themes.show'
        );
        Route::get('tema/{theme}/edit', [ThemeController::class, 'edit'])->name(
            'themes.edit'
        );
        Route::put('tema/{theme}', [ThemeController::class, 'update'])->name(
            'themes.update'
        );
        Route::delete('tema/{theme}', [
            ThemeController::class,
            'destroy',
        ])->name('themes.destroy');
        Route::get('balasan-rsvps', [
            ReplyRsvpController::class,
            'index',
        ])->name('reply-rsvps.index');
        Route::post('balasan-rsvps', [
            ReplyRsvpController::class,
            'store',
        ])->name('reply-rsvps.store');
        Route::get('balasan-rsvps/create', [
            ReplyRsvpController::class,
            'create',
        ])->name('reply-rsvps.create');
        Route::get('balasan-rsvps/{replyRsvp}', [
            ReplyRsvpController::class,
            'show',
        ])->name('reply-rsvps.show');
        Route::get('balasan-rsvps/{replyRsvp}/edit', [
            ReplyRsvpController::class,
            'edit',
        ])->name('reply-rsvps.edit');
        Route::put('balasan-rsvps/{replyRsvp}', [
            ReplyRsvpController::class,
            'update',
        ])->name('reply-rsvps.update');
        Route::delete('balasan-rsvps/{replyRsvp}', [
            ReplyRsvpController::class,
            'destroy',
        ])->name('reply-rsvps.destroy');
    });


// !USER ROUTES
Route::get('/', [WelcomeController::class, 'index']);

// demo
Route::get('/demo/{code}', [InvitationController::class, 'demo'])->name('demo');
// send rsvp
Route::post('/rsvp-invitation', [InvitationController::class, 'sendRsvp']);
// reply rsvp
Route::post('/reply-rsvp', [InvitationController::class, 'replyRsvp']);
// order
Route::get('/order/{code}', [UserOrderController::class, 'order'])->name('order');
Route::post('/order/checkout', [UserOrderController::class, 'make'])->name('order.checkout');
Route::get('/order/payment/{id}', [UserOrderController::class, 'confirmation'])->name('order.confirmation');
Route::get('/success', [UserOrderController::class, 'success'])->name('order.success');
