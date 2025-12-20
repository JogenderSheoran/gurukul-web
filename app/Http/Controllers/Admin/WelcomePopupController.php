<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WelcomePopup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomePopupController extends Controller
{
    /**
     * Display the welcome popup management page.
     */
    public function index()
    {
        $title = 'Welcome Popup Management';
        $popup = WelcomePopup::first();
        return view('admin-v1.admin.welcome-popup.index', compact('popup', 'title'));
    }

    /**
     * Store or update the welcome popup image.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5096',
        ]);

        // Get existing popup or create new
        $popup = WelcomePopup::first();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('welcome-popup', 'public');

            if ($popup) {
                // Delete old image
                if ($popup->image && Storage::disk('public')->exists($popup->image)) {
                    Storage::disk('public')->delete($popup->image);
                }
                // Update existing popup
                $popup->update(['image' => $imagePath]);
            } else {
                // Create new popup
                WelcomePopup::create(['image' => $imagePath]);
            }
        }

        return redirect()->route('admin.welcome-popup.index')
            ->with('success', 'Welcome popup image updated successfully.');
    }

    /**
     * Delete the welcome popup image.
     */
    public function destroy()
    {
        $popup = WelcomePopup::first();

        if ($popup) {
            // Delete image file
            if ($popup->image && Storage::disk('public')->exists($popup->image)) {
                Storage::disk('public')->delete($popup->image);
            }
            $popup->delete();
        }

        return redirect()->route('admin.welcome-popup.index')
            ->with('success', 'Welcome popup image deleted successfully.');
    }
}
