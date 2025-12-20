# Quick Start Guide - Admin Modules

## 🚀 Getting Started (3 Simple Steps)

### Step 1: Run Migrations
```bash
php artisan migrate
```

### Step 2: Create Storage Link
```bash
php artisan storage:link
```

### Step 3: (Optional) Seed Sample Data
```bash
php artisan db:seed --class=AdminModulesSeeder
```

## 📋 Module Access URLs

After setup, access the modules at:

- **Banner Management:** `http://your-domain.com/admin/banner`
- **Top Scorer Management:** `http://your-domain.com/admin/top-scorer`
- **Welcome Popup Management:** `http://your-domain.com/admin/welcome-popup`
- **Blog Management:** `http://your-domain.com/admin/blog`

## 🎯 Quick Feature Overview

### Banner Module
- ✅ Upload banner images
- ✅ Add optional titles
- ✅ Toggle Active/Inactive status
- ✅ Edit or delete banners

### Top Scorer Module
- ✅ Add student achievements
- ✅ Filter by Class, Section, Subject
- ✅ Edit or delete records
- ✅ Sortable listing

### Welcome Popup Module
- ✅ Single popup image management
- ✅ Auto-replace on new upload
- ⚠️ Only ONE image at a time

### Blog Module
- ✅ Create blog posts
- ✅ Draft/Published status
- ✅ Quick status toggle
- ✅ Filter by status
- ✅ Published blogs show on frontend

## 📁 Image Upload Specifications

**Supported Formats:** JPEG, PNG, JPG, GIF, WEBP  
**Maximum Size:** 2MB  
**Storage Location:** `storage/app/public/`

## 🔧 Common Commands

```bash
# Clear all caches
php artisan cache:clear
php artisan route:clear
php artisan config:clear
php artisan view:clear

# Reset database (⚠️ Deletes all data)
php artisan migrate:fresh

# Reset and seed
php artisan migrate:fresh --seed
```

## 🎨 Sidebar Menu Icons

- 🖼️ Banner (Green)
- 🏆 Top Scorer (Yellow)
- 🪟 Welcome Popup (Blue)
- 📝 Blog (Red)

## ⚡ Pro Tips

1. **Banner Status Toggle:** Click the status button in the listing to quickly change Active/Inactive
2. **Blog Quick Publish:** Click the status button to toggle between Draft and Published
3. **Top Scorer Filters:** Use the filter dropdowns to quickly find specific records
4. **Welcome Popup:** New upload automatically replaces the old image - no manual deletion needed

## 🐛 Troubleshooting

**Images not showing?**
```bash
php artisan storage:link
chmod -R 775 storage
```

**Routes not working?**
```bash
php artisan route:clear
php artisan cache:clear
```

**Database errors?**
```bash
php artisan migrate
```

## 📞 Need Help?

Check the detailed documentation in `ADMIN_MODULES_README.md`
