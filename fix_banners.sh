#!/bin/bash

# Script to add pageKey to all banner components

echo "🔧 Fixing all banner components..."

# Infrastructure pages
sed -i 's/<x-inner-banner title="Hostel Facilities"/<x-inner-banner title="Hostel Facilities" pageKey="hostel"/g' resources/views/frontend/bording/hostel.blade.php
sed -i 's/<x-inner-banner\s*title="Nutrition & Mess"/<x-inner-banner title="Nutrition \& Mess" pageKey="nutrition"/g' resources/views/frontend/bording/nutrition.blade.php
sed -i 's/<x-inner-banner\s*title="Health & Wellness"/<x-inner-banner title="Health \& Wellness" pageKey="health-wellness"/g' resources/views/frontend/bording/health-wellness.blade.php
sed -i 's/<x-inner-banner\s*title="Classroom Facilities"/<x-inner-banner title="Classroom Facilities" pageKey="classroom-facilities"/g' resources/views/frontend/infrastructure/classroom-facilities.blade.php
sed -i 's/<x-inner-banner\s*title="Library Facilities"/<x-inner-banner title="Library Facilities" pageKey="library-facilities"/g' resources/views/frontend/infrastructure/library-facilities.blade.php
sed -i 's/<x-inner-banner\s*title="Music & Dance Classes"/<x-inner-banner title="Music \& Dance Classes" pageKey="music-dance-classes"/g' resources/views/frontend/infrastructure/music-dance-classes.blade.php
sed -i 's/<x-inner-banner\s*title="Smart Classrooms"/<x-inner-banner title="Smart Classrooms" pageKey="virtual-and-interactive-board-smart-classrooms"/g' resources/views/frontend/infrastructure/smart-classrooms.blade.php
sed -i 's/<x-inner-banner\s*title="Computer Lab"/<x-inner-banner title="Computer Lab" pageKey="computer-labs"/g' resources/views/frontend/infrastructure/computer-lab.blade.php
sed -i 's/<x-inner-banner\s*title="Physics Laboratory"/<x-inner-banner title="Physics Laboratory" pageKey="physics-labs"/g' resources/views/frontend/infrastructure/physics-lab.blade.php
sed -i 's/<x-inner-banner\s*title="Chemistry Laboratory"/<x-inner-banner title="Chemistry Laboratory" pageKey="chemistry-labs"/g' resources/views/frontend/infrastructure/chemistery-lab.blade.php
sed -i 's/<x-inner-banner\s*title="Biology Laboratory"/<x-inner-banner title="Biology Laboratory" pageKey="biology-labs"/g' resources/views/frontend/infrastructure/biology-lab.blade.php
sed -i 's/<x-inner-banner\s*title="Art Laboratory"/<x-inner-banner title="Art Laboratory" pageKey="art-labs"/g' resources/views/frontend/infrastructure/art-lab.blade.php

# Special Programs
sed -i 's/<x-inner-banner\s*title="Sports Complex"/<x-inner-banner title="Sports Complex" pageKey="sports-complex"/g' resources/views/frontend/special-program/sports-complex.blade.php
sed -i 's/<x-inner-banner\s*title="Reading Mission"/<x-inner-banner title="Reading Mission" pageKey="reading-mission"/g' resources/views/frontend/special-program/reading-mission.blade.php
sed -i 's/<x-inner-banner\s*title="Celebrations & Adventure Trips"/<x-inner-banner title="Celebrations \& Adventure Trips" pageKey="celebration-adventure"/g' resources/views/frontend/special-program/celebrations-adventure.blade.php
sed -i 's/<x-inner-banner\s*title="Co-curricular Activities"/<x-inner-banner title="Co-curricular Activities" pageKey="co-curricular-activities"/g' resources/views/frontend/special-program/co-curricular-activities.blade.php
sed -i 's/<x-inner-banner\s*title="Excellence in Competitive Examinations"/<x-inner-banner title="Excellence in Competitive Examinations" pageKey="competitive-exam"/g' resources/views/frontend/special-program/competitive-examinations.blade.php
sed -i 's/<x-inner-banner\s*title="House System"/<x-inner-banner title="House System" pageKey="house-system"/g' resources/views/frontend/special-program/house-system.blade.php

# Admission pages
sed -i 's/<x-inner-banner\s*title="Admission Procedure"/<x-inner-banner title="Admission Procedure" pageKey="admission-procedure"/g' resources/views/frontend/admission/admission-procedure.blade.php
sed -i 's/<x-inner-banner\s*title="Fee Structure"/<x-inner-banner title="Fee Structure" pageKey="fee-structure"/g' resources/views/frontend/admission/fee-structure.blade.php
sed -i 's/<x-inner-banner\s*title="Required Items"/<x-inner-banner title="Required Items" pageKey="required-item"/g' resources/views/frontend/admission/required-item.blade.php
sed -i 's/<x-inner-banner\s*title="Important Information"/<x-inner-banner title="Important Information" pageKey="important-information"/g' resources/views/frontend/admission/important-information.blade.php
sed -i 's/<x-inner-banner\s*title="Entrance cum Syllabus"/<x-inner-banner title="Entrance cum Syllabus" pageKey="entrance-cum-syllabus"/g' resources/views/frontend/admission/entrance-cum-syllabus.blade.php

# Blog & News
sed -i 's/<x-inner-banner\s*title="Our Blog"/<x-inner-banner title="Our Blog" pageKey="blogs"/g' resources/views/frontend/blog/index.blade.php
sed -i 's/<x-inner-banner title="School News"/<x-inner-banner title="School News" pageKey="news"/g' resources/views/frontend/news/index.blade.php
sed -i 's/<x-inner-banner title="School Events"/<x-inner-banner title="School Events" pageKey="events"/g' resources/views/frontend/events/index.blade.php

echo "✅ All banners fixed!"
echo "📝 Now upload banners in admin panel at: /admin/page-banner"
echo "🔄 Clear cache: php artisan cache:clear && php artisan view:clear"
