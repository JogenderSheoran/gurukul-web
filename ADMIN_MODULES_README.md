# Admin Modules Setup Guide

This document provides instructions for setting up and using the newly created admin modules.

## Modules Created

1. **Banner Management** - Manage website banners with images and status
2. **Top Scorer Management** - Track and display top-performing students
3. **Welcome Popup Management** - Manage welcome popup images (single image only)
4. **Blog Management** - Create and manage blog posts with draft/published status

## Installation Steps

### 1. Run Database Migrations

Execute the following command to create all necessary database tables:

```bash
php artisan migrate
```

This will create the following tables:
- `banners`
- `top_scorers`
- `welcome_popups`
- `blogs`

### 2. Create Storage Link

For image uploads to work properly, create a symbolic link from `public/storage` to `storage/app/public`:

```bash
php artisan storage:link
```

### 3. Set Proper Permissions

Ensure the storage directory has proper write permissions:

```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

## Module Features

### 1. Banner Management
**Route:** `/admin/banner`

**Features:**
- ✅ View all banners in a list
- ✅ Create new banner with image upload
- ✅ Edit existing banner (update image, title, status)
- ✅ Delete banner
- ✅ Toggle status (Active/Inactive) with AJAX
- ✅ Image validation (JPEG, PNG, JPG, GIF, WEBP - Max 2MB)

**Fields:**
- Banner Image (required)
- Title (optional)
- Status (Active/Inactive)
- Created At (auto)

### 2. Top Scorer Management
**Route:** `/admin/top-scorer`

**Features:**
- ✅ View all top scorers with filters
- ✅ Add new top scorer
- ✅ Edit top scorer details
- ✅ Delete top scorer record
- ✅ Filter by Class, Section, Subject
- ✅ Sortable listing

**Fields:**
- Name (required)
- Class (required)
- Section (required)
- Subject (required)

### 3. Welcome Popup Management
**Route:** `/admin/welcome-popup`

**Features:**
- ✅ Upload popup image
- ✅ View current popup image
- ✅ Replace existing image
- ⚠️ **Only ONE image exists at a time** (new upload replaces old)
- ✅ Delete popup image
- ✅ Image validation (JPEG, PNG, JPG, GIF, WEBP - Max 2MB)

**Fields:**
- Popup Image (required)

### 4. Blog Management
**Route:** `/admin/blog`

**Features:**
- ✅ Create blog post
- ✅ Edit blog post
- ✅ Delete blog post
- ✅ Toggle Publish/Draft status with AJAX
- ✅ Filter by status (Draft/Published)
- ✅ Published blogs visible on frontend
- ✅ Draft blogs hidden from frontend

**Fields:**
- Title (required)
- Author (required)
- Content (required)
- Status (Draft/Published)
- Publish Date (optional)
- Created At (auto)

## Routes Summary

### Banner Routes
```
GET    /admin/banner              - List all banners
GET    /admin/banner/create       - Show create form
POST   /admin/banner              - Store new banner
GET    /admin/banner/{id}/edit    - Show edit form
PUT    /admin/banner/{id}         - Update banner
DELETE /admin/banner/{id}         - Delete banner
POST   /admin/banner/{id}/toggle-status - Toggle status
```

### Top Scorer Routes
```
GET    /admin/top-scorer              - List all top scorers
GET    /admin/top-scorer/create       - Show create form
POST   /admin/top-scorer              - Store new top scorer
GET    /admin/top-scorer/{id}/edit    - Show edit form
PUT    /admin/top-scorer/{id}         - Update top scorer
DELETE /admin/top-scorer/{id}         - Delete top scorer
```

### Welcome Popup Routes
```
GET    /admin/welcome-popup       - View/manage popup
POST   /admin/welcome-popup       - Upload/replace image
DELETE /admin/welcome-popup       - Delete popup image
```

### Blog Routes
```
GET    /admin/blog              - List all blogs
GET    /admin/blog/create       - Show create form
POST   /admin/blog              - Store new blog
GET    /admin/blog/{id}/edit    - Show edit form
PUT    /admin/blog/{id}         - Update blog
DELETE /admin/blog/{id}         - Delete blog
POST   /admin/blog/{id}/toggle-status - Toggle publish status
```

## File Structure

```
app/
├── Http/Controllers/Admin/
│   ├── BannerController.php
│   ├── TopScorerController.php
│   ├── WelcomePopupController.php
│   └── BlogController.php
├── Models/
│   ├── Banner.php
│   ├── TopScorer.php
│   ├── WelcomePopup.php
│   └── Blog.php

database/migrations/
├── 2024_12_14_000001_create_banners_table.php
├── 2024_12_14_000002_create_top_scorers_table.php
├── 2024_12_14_000003_create_welcome_popups_table.php
└── 2024_12_14_000004_create_blogs_table.php

resources/views/admin/admin/
├── banner/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
├── top-scorer/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
├── welcome-popup/
│   └── index.blade.php
└── blog/
    ├── index.blade.php
    ├── create.blade.php
    └── edit.blade.php
```

## Sidebar Menu

All modules are accessible from the admin sidebar with the following icons:
- 🖼️ **Banner** (Green image icon)
- 🏆 **Top Scorer** (Yellow trophy icon)
- 🪟 **Welcome Popup** (Blue window icon)
- 📝 **Blog** (Red blog icon)

## Important Notes

### Image Upload
- All images are stored in `storage/app/public/` directory
- Images are accessible via `storage/` URL after running `php artisan storage:link`
- Supported formats: JPEG, PNG, JPG, GIF, WEBP
- Maximum file size: 2MB

### Welcome Popup Behavior
- **Only ONE popup image can exist at a time**
- Uploading a new image automatically replaces the previous one
- Old image file is deleted when replaced

### Blog Status
- **Draft:** Not visible on frontend
- **Published:** Visible on frontend
- Status can be toggled quickly via AJAX button

### Validation
- All forms include proper validation
- Error messages display below fields
- Success messages appear after operations

## Usage Examples

### Creating a Banner
1. Navigate to Admin → Banner
2. Click "Add New Banner"
3. Upload an image
4. Add optional title
5. Select status (Active/Inactive)
6. Click "Create Banner"

### Managing Top Scorers
1. Navigate to Admin → Top Scorer
2. Click "Add Top Scorer"
3. Fill in student details
4. Click "Add Top Scorer"
5. Use filters to find specific records

### Setting Welcome Popup
1. Navigate to Admin → Welcome Popup
2. Upload popup image
3. Image replaces any existing popup
4. Delete if needed

### Creating Blog Posts
1. Navigate to Admin → Blog
2. Click "Create Blog Post"
3. Fill in title, author, content
4. Choose Draft or Published
5. Optionally set publish date
6. Click "Create Blog Post"

## Troubleshooting

### Images not displaying
- Run `php artisan storage:link`
- Check storage folder permissions
- Verify image path in database

### Routes not working
- Run `php artisan route:clear`
- Run `php artisan cache:clear`

### Database errors
- Run `php artisan migrate:fresh` (⚠️ This will delete all data)
- Or run `php artisan migrate` to apply pending migrations

## Support

For any issues or questions, please check:
1. Laravel logs: `storage/logs/laravel.log`
2. Browser console for JavaScript errors
3. Network tab for AJAX request failures
