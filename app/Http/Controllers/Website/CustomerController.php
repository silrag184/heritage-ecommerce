<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function saveCustomerInfo(Request $request)
    {
        $request->validate([
            'c_full_name' => 'required|string|max:255',
            'c_phone' => 'required|string|max:15|unique:customers',
            'c_email' => 'nullable|email|unique:customers',
            'c_password' => 'required|string|min:8|confirmed',
        ]);

        $customer = Customer::create([
            'c_full_name' => $request->c_full_name,
            'c_phone' => $request->c_phone,
            'c_email' => $request->c_email,
            'c_password' => Hash::make($request->c_password),
        ]);

        Auth::guard('customer')->login($customer);

        return response()->json(['success' => true, 'message' => 'Registration successful!', 'redirect' => route('customer.dashboard')]);
    }

    public function customerLoginCheck(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginField = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'c_email' : 'c_phone';

        // Check if the customer exists and has a password (not OAuth-only)
        $customer = Customer::where($loginField, $request->login)->first();

        if (!$customer || !$customer->c_password) {
            return redirect()->back()->withErrors(['login' => 'Invalid credentials or account created via OAuth.'])->withInput();
        }

        if (Auth::guard('customer')->attempt([$loginField => $request->login, 'password' => $request->password], $request->remember)) {
            $customer = Auth::guard('customer')->user();
            $customer->increment('login_count');
            return redirect()->route('customer.dashboard');
        }

        return redirect()->back()->withErrors(['login' => 'Invalid credentials.'])->withInput();
    }

    public function check(Request $request)
    {
        return response()->json([
            'logged_in' => Auth::guard('customer')->check(),
        ]);
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        Session::flush();
        return redirect()->route('home')->with('success', 'Logged out successfully!');
    }

    public function customerDashboard()
    {
        return view('website.pages.customer.my-account');
    }

    public function customerProfile()
    {
        return view('website.pages.customer.my-account-edit');
    }

    public function customerUpdateProfile(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'c_full_name' => 'required|string|max:255',
            'c_phone' => 'required|string|max:15|unique:customers,c_phone,' . $id,
            'c_email' => 'nullable|email|unique:customers,c_email,' . $id,
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'c_address' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'current_password' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Handle password change
        if ($request->filled('password')) {
            if (!$customer->c_password) {
                // OAuth user, allow setting password without current
            } else {
                if (!Hash::check($request->current_password, $customer->c_password)) {
                    return back()->withErrors(['current_password' => 'Current password is incorrect.']);
                }
            }
            $customer->c_password = Hash::make($request->password);
        }

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/images/customers'), $imageName);
            $customer->c_image = $imageName;
        }

        $customer->update($request->only([
            'c_full_name', 'c_phone', 'c_email', 'date_of_birth', 'gender', 'c_address'
        ]));

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function customerOrder()
    {
        $customer = Auth::guard('customer')->user();
        $orders = \App\Models\Order::where('customer_id', $customer->id)->orderBy('created_at', 'desc')->get();

        return view('website.pages.customer.my-account-orders', compact('orders'));
    }

    public function customerOrderDetails($orderNumber)
    {
        $customer = Auth::guard('customer')->user();
        $order = \App\Models\Order::where('order_number', $orderNumber)
            ->where('customer_id', $customer->id)
            ->with(['orderDetails.product'])
            ->firstOrFail();

        return view('website.pages.customer.my-account-order-details', compact('order'));
    }

    public function customerChangePassword()
    {
        return view('website.pages.customer.change-password');
    }

    public function customerPasswordUpdate(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        // If customer has no password (OAuth user), allow setting a new password without current password
        if (!$customer->c_password) {
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);
        } else {
            $request->validate([
                'current_password' => 'required|string',
                'password' => 'required|string|min:8|confirmed',
            ]);

            if (!Hash::check($request->current_password, $customer->c_password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }
        }

        $customer->update(['c_password' => Hash::make($request->password)]);

        return redirect()->back()->with('success', 'Password updated successfully!');
    }

    public function deleteAccount(Request $request)
    {
        $customer = Auth::guard('customer')->user();

        // Delete the customer record
        $customer->delete();

        // Logout the user
        Auth::guard('customer')->logout();

        return redirect()->route('home')->with('success', 'Your account has been deleted successfully.');
    }

    public function customerWishlist()
    {
        // Implement wishlist logic here
        return view('website.pages.customer.wishlist');
    }

    public function wishlist(Request $request, $id)
    {
        // Implement add to wishlist logic here
        return redirect()->back()->with('success', 'Added to wishlist!');
    }

    public function deleteWishlist($id)
    {
        // Implement remove from wishlist logic here
        return redirect()->back()->with('success', 'Removed from wishlist!');
    }

    public function customerAddress()
    {
        return view('website.pages.customer.my-account-address');
    }

    public function updateAddress(Request $request)
    {
        $request->validate([
            'c_address' => 'required|string|max:500',
        ]);

        $customer = Auth::guard('customer')->user();
        $customer->update([
            'c_address' => $request->c_address,
        ]);

        return redirect()->back()->with('success', 'Address updated successfully!');
    }

    public function deleteAddress()
    {
        $customer = Auth::guard('customer')->user();
        $customer->update([
            'c_address' => null,
        ]);

        return redirect()->back()->with('success', 'Address deleted successfully!');
    }

    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    // public function googleCallback()
    // {
    //     try {
    //         $googleUser = Socialite::driver('google')->user();

    //         $customer = Customer::where('oauth_provider', 'google')
    //             ->where('oauth_id', $googleUser->getId())
    //             ->first();

    //         if (!$customer) {
    //             // Check if email already exists
    //             $existingCustomer = Customer::where('c_email', $googleUser->getEmail())->first();

    //             if ($existingCustomer) {
    //                 // Link Google account to existing customer
    //                 $existingCustomer->update([
    //                     'oauth_provider' => 'google',
    //                     'oauth_id' => $googleUser->getId(),
    //                 ]);
    //                 $customer = $existingCustomer;
    //             } else {
    //                 // Create new customer
    //                 $customer = Customer::create([
    //                     'c_full_name' => $googleUser->getName(),
    //                     'c_email' => $googleUser->getEmail(),
    //                     'oauth_provider' => 'google',
    //                     'oauth_id' => $googleUser->getId(),
    //                     'email_verified_at' => now(),
    //                     'is_guest' => false,
    //                     'c_password' => null, // No password for OAuth users
    //                 ]);
    //             }
    //         }

    //         Auth::guard('customer')->login($customer);
    //         $customer->increment('login_count');

    //         return redirect()->route('customer.dashboard')->with('success', 'Logged in with Google successfully!');
    //     } catch (\Exception $e) {
    //         return redirect()->route('home')->with('error', 'Google login failed. Please try again.');
    //     }
    // }

    public function googleCallback()
    {
        try {
            // Get user info from Google
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Try to find existing user by OAuth
            $customer = Customer::where('oauth_provider', 'google')
                ->where('oauth_id', $googleUser->getId())
                ->first();

            if (!$customer) {
                // Check if email already exists
                $existingCustomer = Customer::where('c_email', $googleUser->getEmail())->first();

                if ($existingCustomer) {
                    // Link Google account to existing customer
                    $existingCustomer->update([
                        'oauth_provider' => 'google',
                        'oauth_id' => $googleUser->getId(),
                    ]);
                    $customer = $existingCustomer;
                } else {
                    // Create new customer
                    $customer = Customer::create([
                        'c_full_name'      => $googleUser->getName(),
                        'c_email'          => $googleUser->getEmail(),
                        'c_phone'          => null, // or 'N/A'
                        'c_password'       => bcrypt(Str::random(16)), // Random password for OAuth
                        'oauth_provider'   => 'google',
                        'oauth_id'         => $googleUser->getId(),
                        'email_verified_at'=> now(),
                        'is_guest'         => false,
                        'login_count'      => 0,
                    ]);
                }
            }

            // Log the user in using custom guard
            Auth::guard('customer')->login($customer);

            // Increment login count
            $customer->increment('login_count');

            return redirect()->route('customer.dashboard')->with('success', 'Logged in with Google successfully!');

        } catch (\Exception $e) {
            // For debugging you can log the error
            \Log::error('Google OAuth Error: '.$e->getMessage());

            return redirect()->route('home')->with('error', 'Google login failed. Please try again.');
        }
    }
}
