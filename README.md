# DIJA Group Export - Multi-Lingual Laravel CMS & Portal

A modern, high-performance web application and Content Management System (CMS) built with **Laravel 12 / PHP 8.3** for **DIJA Group Export**, specializing in international commodity sourcing, maritime freight, customs clearance, and global trade solutions.

---

## 🌟 Key Features

### 1. Multi-Lingual Frontend (EN / AR / FR)
- **Languages Supported**:
  - **English (EN)**
  - **Arabic (AR - Full Right-To-Left `dir="rtl"` Support)** with customized Cairo typography and preserved Font Awesome 6 icons.
  - **French (FR)**
- **Pages**:
  - **Homepage**: Hero slider, feature highlights, export overview, counter stats, and customer inquiry form.
  - **About Us**: Company overview, leadership profiles, mission, vision, and corporate achievements.
  - **Services & Service Details**: Agricultural commodities, industrial minerals, maritime freight, and customs documentation.
  - **Blog & Insights**: In-depth trade guides, Incoterms compliance, and export documentation articles.
  - **Contact & Request a Quote**: Interactive form directly capturing customer specifications into the CMS.

### 2. Custom DIJA Admin CMS Dashboard
- **Access Route**: `/admin`
- **Default Super Admin**:
  - **Email**: `admin@dijagroup.com`
  - **Password**: `admin123456`
- **Capabilities**:
  - **Site Settings**: Manage site title, slogan, description, contact numbers, email, address, and upload dark/light logos with separate multi-lingual tabs.
  - **Hero Slider Management**: Add, update, re-order, and manage slides with background images and action buttons.
  - **Services Management**: Full CRUD operations for export services with multi-lingual titles, excerpts, details, icons, and featured images.
  - **Articles & Insights**: Create, edit, and publish blog articles with automated slug generation.
  - **Team Members**: Manage trade specialists and executive profiles.
  - **Inquiries & Leads**: Real-time management of quote requests and inquiries with status updating (`New`, `Read`, `Replied`).

---

## 🚀 Getting Started

### Prerequisites
- **PHP** >= 8.2 (Recommended: PHP 8.3+)
- **Composer** >= 2.x
- **MySQL** / MariaDB (e.g. Laragon or XAMPP)

### Installation Steps

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/ahmedb0o0di/diga-export.git
   cd diga-export
   ```

2. **Install Composer Dependencies**:
   ```bash
   composer install
   ```

3. **Configure Environment**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Edit `.env` to configure your MySQL database credentials (e.g., `DB_DATABASE=dija_export`).*

4. **Run Migrations & Seed Default Data**:
   ```bash
   php artisan migrate --seed
   ```

5. **Start the Development Server**:
   ```bash
   php artisan serve
   ```
   Browse to `http://localhost:8000` or admin dashboard at `http://localhost:8000/admin/login`.

---

## 🛡️ License & Attribution
Designed and developed for **DIJA Group Export**.  
Website powered by [AISE Digital](https://aise-digital.com/).
