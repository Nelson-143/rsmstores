<p align="center">
  <img src="https://cdn.worldvectorlogo.com/logos/laravel-2.svg" alt="Laravel Logo" height="100">
</p>

<div align="center">
  <img src="https://img.shields.io/badge/Laravel-10.0-ff2d20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel Badge">
</div>

# **Roman Stock Manager V2**

#### **📋Table of Contents**

- 🔍 Project Overview
- ⚙️ Core Functionalities
- 📊 Database Structure
- 🖼️ User Interface Screenshots
- 🚀 Running the Project
- 🤝 Contribution Guidelines
- 👥 Team Members & Contact Info

## **🔍Project Overview**

The Roman Stock Manager V2 is a web-based application built with PHP Laravel to manage stock, orders, and customer payments 💼. This enhanced version introduces advanced features like Financial Assistance and an AI Business Assistant, making it a comprehensive tool for businesses to track inventory in real-time with intuitive forms 📑 and robust reporting 📈.

## **⚙️Core Functionalities**

- 🛒 **Product Management:** Add, update, and manage product stock and categories.
- 📝 **Order Processing:** Handle customer orders, manage payments (💵 HandCash, 🧾 Cheque, 🕐 Due), and track order statuses.
- 👥 **Customer Management:** Store and update customer details.
- 📊 **Reports:** Generate stock, transaction, and payment status reports.
- 💰 **Financial Assistance:** Get insights on financial health, cash flow management, and expense tracking.
- 🤖 **AI Business Assistant:** Utilize AI to analyze sales trends, forecast inventory needs, and provide business recommendations.

## **📊 Database Structure**

Below is a visual representation of the core tables used within the system:

**Tables Schema:**

![Screenshot](https://github.com/7amo10/Inventory-Management-System/blob/main/Documentation%20%26%20Presentation/Tables-Schema.png)

#### Tables Overview📄

Main Tables:

- Products (`id`, `name`, `category_id`, `quantity`, `price`, `created_at`, `updated_at`)
- Orders (`id`, `customer_id`, `total_amount`, `payment_type`, `status`, `created_at`, `updated_at`)
- Customers (`id`, `name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`)
- Financials (`id`, `total_income`, `total_expenses`, `net_profit`, `created_at`, `updated_at`)
- AI_Insights (`id`, `sales_trend`, `inventory_forecast`, `recommendations`, `created_at`, `updated_at`)

## **🖼️User  Interface Preview**

- Order Management Form

    - ![Screenshot](https://github.com/7amo10/Inventory-Management-System/blob/main/Documentation%20%26%20Presentation/asests/Orders.png)

- Purchase Management Dashboard

    - ![Screenshot](https://github.com/7amo10/Inventory-Management-System/blob/main/Documentation%20%26%20Presentation/asests/Purchases.png)

- Financial Overview Dashboard

    - ![Screenshot](https://github.com/7amo10/Inventory-Management-System/blob/main/Documentation%20%26%20Presentation/asests/Financials.png)

- AI Business Insights

    - ![Screenshot](https://github.com/7amo10/Inventory-Management-System/blob/main/Documentation%20%26%20Presentation/asests/AIInsights.png)

## **🚀Running the Project**

**Prerequisites**

- 🐘PHP >= 8.0
- 🧩 Composer
- 🗄️MySQL or other supported databases

## **Steps to Run Locally🔧:**

- 1. Clone the repository: 

    ```bash
    git clone https://github.com/Nelson-143/rsmstores.git
    ```

- 2. Navigate to the project folder:
    
    ```bash
    cd rsmstores
    ```

- 3. Install dependencies:

    ```bash
    composer install
    ```

- 4. Create a `.env` file from the example:
    
    ```bash
    cp .env.example .env
    ```

- 5. Configure your .env file with the appropriate database settings.

- 6. Run the database migrations:

    ```bash
    php artisan migrate
    ```

- 7. Seed the database (optional):

    ```bash
    php artisan db:seed
    ```

- 8. Start the Laravel development server:🌐
    
    ```bash
    php artisan serve
    ```

## **🤝Contribution  **
Crown 
Roman
We welcome contributions from the community. Please adhere to