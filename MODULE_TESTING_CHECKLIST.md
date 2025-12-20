# Module Testing Checklist / मॉड्यूल परीक्षण चेकलिस्ट

## Pre-Testing Setup / परीक्षण से पहले सेटअप

### 1. Clear All Caches:
```bash
cd /home/dev/Downloads/gurukul-web
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

### 2. Run Migrations (if needed):
```bash
# Check migration status
php artisan migrate:status

# If stats table needs update, run:
php artisan migrate:refresh --path=/database/migrations/2025_12_15_160952_create_stats_table.php

# If news_events table needs update, run:
php artisan migrate:refresh --path=/database/migrations/2025_12_15_160950_create_news_events_table.php
```

### 3. Start Development Server:
```bash
php artisan serve
```

---

## Stats Module Testing / आंकड़े मॉड्यूल परीक्षण

### Access URL:
`http://localhost:8000/admin/stat`

### Test Checklist:

#### ✅ Index Page (Listing)
- [ ] Page loads without errors
- [ ] Shows 4 stat cards: Total Stats, Active, Inactive, Today
- [ ] DataTable displays with correct columns:
  - [ ] # (Serial Number)
  - [ ] Label / लेबल
  - [ ] Value / मान
  - [ ] Suffix / प्रत्यय
  - [ ] Icon / आइकन
  - [ ] Order / क्रम
  - [ ] Status / स्थिति
  - [ ] Created At / बनाया गया
  - [ ] Actions / क्रियाएं
- [ ] "Add New Stat" button visible
- [ ] Status filter dropdown works
- [ ] Search functionality works
- [ ] Pagination works

#### ✅ Create Page
- [ ] Click "Add New Stat" button
- [ ] Form displays with fields:
  - [ ] Label (required)
  - [ ] Value (required)
  - [ ] Suffix (optional)
  - [ ] Icon (optional)
  - [ ] Status (active/inactive)
  - [ ] Order (number)
- [ ] All labels show English/Hindi
- [ ] Submit button works
- [ ] Validation works (try submitting empty form)
- [ ] Success message appears
- [ ] Redirects to index page after creation

#### ✅ Edit Page
- [ ] Click edit button (pencil icon) on any stat
- [ ] Form loads with existing data
- [ ] All fields are editable
- [ ] Update button works
- [ ] Success message appears
- [ ] Changes reflect in listing

#### ✅ Toggle Status
- [ ] Click toggle button (sync icon)
- [ ] Status changes immediately
- [ ] Success notification appears
- [ ] Badge color updates (green for active, gray for inactive)
- [ ] No page reload occurs

#### ✅ Delete
- [ ] Click delete button (trash icon)
- [ ] Confirmation dialog appears
- [ ] Clicking "Yes" deletes the record
- [ ] Success message appears
- [ ] Record removed from table

---

## News & Event Module Testing / समाचार और इवेंट मॉड्यूल परीक्षण

### Access URL:
`http://localhost:8000/admin/news-event`

### Test Checklist:

#### ✅ Index Page (Listing)
- [ ] Page loads without errors
- [ ] Shows 4 stat cards: Total News/Events, Active, Inactive, Today
- [ ] DataTable displays with correct columns:
  - [ ] # (Serial Number)
  - [ ] Title
  - [ ] Category
  - [ ] Event Date
  - [ ] Order
  - [ ] Status
  - [ ] Created At
  - [ ] Actions
- [ ] "Add New" button visible
- [ ] Status filter dropdown works (All, Active, Inactive)
- [ ] Category filter dropdown works (All, News, Event)
- [ ] Search functionality works
- [ ] Pagination works

#### ✅ Create Page
- [ ] Click "Add New" button
- [ ] Form displays with fields:
  - [ ] Title (required)
  - [ ] Category (news/event, required)
  - [ ] Status (active/inactive, required)
  - [ ] Description (optional)
  - [ ] Event Date (optional)
  - [ ] Display Order (number)
  - [ ] Icon Class (optional)
- [ ] All labels show English/Hindi
- [ ] Category dropdown has News/समाचार and Event/इवेंट options
- [ ] Submit button works
- [ ] Validation works
- [ ] Success redirect to index

#### ✅ Edit Page
- [ ] Click edit button on any news/event
- [ ] Form loads with existing data
- [ ] Variable name is `$newsEvent` (not `$blog`)
- [ ] All fields are editable
- [ ] Category shows correctly
- [ ] Event date displays correctly
- [ ] Update button works
- [ ] Changes reflect in listing

#### ✅ Toggle Status
- [ ] Click toggle button (sync icon)
- [ ] Status changes immediately
- [ ] Success notification appears
- [ ] Badge color updates
- [ ] No page reload occurs

#### ✅ Delete
- [ ] Click delete button
- [ ] Confirmation dialog appears
- [ ] Deletion works
- [ ] Success message appears
- [ ] Record removed from table

---

## Common Issues & Solutions / सामान्य समस्याएं और समाधान

### Issue: "Table doesn't exist" error
**Solution:**
```bash
php artisan migrate
```

### Issue: "Route not found" error
**Solution:**
```bash
php artisan route:clear
php artisan config:clear
```

### Issue: Blade view not updating
**Solution:**
```bash
php artisan view:clear
```

### Issue: Toggle status not working
**Check:**
1. Browser console for JavaScript errors
2. Network tab for AJAX request status
3. Laravel logs: `storage/logs/laravel.log`
4. Verify CSRF token is present

### Issue: DataTable not loading data
**Check:**
1. Browser console for errors
2. Network tab - check `/admin/stat/data` or `/admin/news-event/data` response
3. Verify controller `getData()` method is working
4. Check database has records

---

## Sample Test Data / नमूना परीक्षण डेटा

### Stats Module Sample:
```
Label: Students Enrolled / नामांकित छात्र
Value: 5000+
Suffix: Students
Icon: fas fa-users
Status: Active
Order: 1
```

```
Label: Success Rate / सफलता दर
Value: 95
Suffix: %
Icon: fas fa-chart-line
Status: Active
Order: 2
```

### News & Event Module Sample:
```
Title: Annual Day Celebration / वार्षिक दिवस समारोह
Category: Event
Description: Join us for our annual day celebration
Event Date: 2025-12-25
Status: Active
Order: 1
Icon: fas fa-calendar-alt
```

```
Title: New Admission Open / नया प्रवेश खुला
Category: News
Description: Admissions are now open for the new session
Event Date: 2025-01-15
Status: Active
Order: 2
Icon: fas fa-newspaper
```

---

## Verification Commands / सत्यापन कमांड

### Check Routes:
```bash
# Stats routes
php artisan route:list --name=stat

# News & Event routes
php artisan route:list --name=news-event
```

### Check Syntax:
```bash
# Controllers
php -l app/Http/Controllers/Admin/StatController.php
php -l app/Http/Controllers/Admin/NewsEventController.php

# Models
php -l app/Models/Stat.php
php -l app/Models/NewsEvent.php
```

### Check Database:
```bash
# Enter MySQL/MariaDB
php artisan tinker

# Check stats table
>>> \App\Models\Stat::count()
>>> \App\Models\Stat::all()

# Check news_events table
>>> \App\Models\NewsEvent::count()
>>> \App\Models\NewsEvent::all()

# Exit tinker
>>> exit
```

---

## Success Criteria / सफलता मानदंड

### Stats Module ✅
- [ ] All CRUD operations work
- [ ] Toggle status works without page reload
- [ ] Filters work correctly
- [ ] Search works
- [ ] Bilingual labels display correctly
- [ ] No JavaScript errors in console
- [ ] No PHP errors in logs

### News & Event Module ✅
- [ ] All CRUD operations work
- [ ] Toggle status works without page reload
- [ ] Both filters (status & category) work
- [ ] Search works
- [ ] Bilingual labels display correctly
- [ ] No JavaScript errors in console
- [ ] No PHP errors in logs

---

## Final Verification / अंतिम सत्यापन

After completing all tests:

1. **Check Browser Console:** No JavaScript errors
2. **Check Laravel Logs:** `tail -f storage/logs/laravel.log`
3. **Check Network Tab:** All AJAX requests return 200 status
4. **Test on Different Browsers:** Chrome, Firefox, Edge
5. **Test Responsive Design:** Mobile, Tablet, Desktop views

---

**If all checkboxes are ticked, modules are working perfectly! ✅**
**यदि सभी चेकबॉक्स टिक हैं, तो मॉड्यूल पूरी तरह से काम कर रहे हैं! ✅**
