# Hospital Air Quality Monitoring 🏥🌿

An IoT-based hospital air quality monitoring system designed to monitor and assess indoor environmental conditions in real time.

This project was developed as a web-based monitoring platform for **RSUD Dr. Soedomo Trenggalek**, providing a digital interface for monitoring environmental conditions within hospital areas.

## ✨ Features

* 🌡️ Real-time environmental monitoring
* 💨 Air quality monitoring
* 🌡️ Temperature monitoring
* 💧 Humidity monitoring
* 📊 Environmental condition visualization
* 🚦 Air quality status assessment
* 🏥 Hospital-focused monitoring
* 📱 Responsive web interface
* 🗄️ Database integration
* 📈 Historical environmental data

## 🎯 Project Overview

**Hospital Air Quality Monitoring** is a web-based monitoring system designed to help monitor indoor environmental conditions in a hospital environment.

The system collects environmental data from connected sensors and presents the information through a web-based dashboard, allowing users to observe changes in environmental conditions and identify potentially unhealthy conditions.

## 🏥 Project Location

**RSUD Dr. Soedomo Trenggalek**

Trenggalek, East Java, Indonesia.

## 🏗️ System Architecture

```text
Environmental Sensors
        │
        ▼
   IoT Controller
        │
        ▼
 Data Collection
        │
        ▼
 Backend / Database
        │
        ▼
 Web Monitoring Dashboard
        │
        ▼
 Environmental Status
```

## 📊 Monitoring

The system is designed to monitor important indoor environmental parameters such as:

| Parameter       | Purpose                             |
| --------------- | ----------------------------------- |
| 🌡️ Temperature | Monitor indoor temperature          |
| 💧 Humidity     | Monitor indoor humidity             |
| 💨 Air Quality  | Assess environmental air conditions |

The monitored values can be presented through the web dashboard to make environmental conditions easier to understand.

## 🖥️ Web Dashboard

The web application provides a centralized interface for displaying environmental monitoring data.

The dashboard can be used to:

* View current environmental conditions
* Monitor air quality status
* Review environmental measurements
* Observe changes in monitored parameters
* Support environmental monitoring activities

## 🛠️ Technologies

### Backend

* PHP
* Laravel

### Frontend

* HTML5
* CSS3
* JavaScript
* Vite

### Database

* MySQL

### IoT

* Microcontroller
* Environmental Sensors

## 📂 Project Structure

```text
Hospital-Air-Quality-Monitoring/
│
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
│
├── .env.example
├── artisan
├── composer.json
├── package.json
├── phpunit.xml
├── vite.config.js
└── README.md
```

## 🚀 Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/AnantaR07/Hospital-Air-Quality-Monitoring.git
cd Hospital-Air-Quality-Monitoring
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Frontend Dependencies

```bash
npm install
```

### 4. Configure Environment

Copy the example environment file:

```bash
cp .env.example .env
```

Generate the Laravel application key:

```bash
php artisan key:generate
```

### 5. Configure Database

Update the database configuration inside `.env`:

```env
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 6. Run Database Migration

```bash
php artisan migrate
```

### 7. Start Laravel

```bash
php artisan serve
```

### 8. Start Vite

```bash
npm run dev
```

## 🎯 Project Objectives

The main objectives of this project are:

* Digitize hospital environmental monitoring
* Provide real-time environmental information
* Make air quality conditions easier to observe
* Support early identification of unhealthy environmental conditions
* Provide a centralized web-based monitoring interface

## 🔮 Future Improvements

Possible future improvements include:

* 📱 Mobile application
* 🔔 Real-time notifications
* 📲 Telegram or WhatsApp alerts
* 📈 Advanced monitoring charts
* 🤖 Automatic air quality classification
* 📊 Monitoring reports
* 👥 Multi-user authentication
* 🏥 Multi-room monitoring
* ☁️ Cloud-based IoT infrastructure
* 📡 MQTT communication
* 🚨 Automatic warning system

## 📌 Project Status

**Completed — IoT & Web Development Portfolio Project**

## 👨‍💻 Author

**Ananta Romadhan**

Junior Full Stack Developer | IoT Engineer

GitHub: https://github.com/AnantaR07
