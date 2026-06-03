<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $skills = [
            'Backend' => [
                ['name' => 'Laravel', 'level' => 'expert', 'icon' => ''],
                ['name' => 'PHP', 'level' => 'expert', 'icon' => ''],
                ['name' => 'RESTful API', 'level' => 'expert', 'icon' => ''],
                ['name' => 'JWT Authentication', 'level' => 'advanced', 'icon' => ''],
                ['name' => 'Web Sockets', 'level' => 'advanced', 'icon' => ''],
                ['name' => 'Ajax', 'level' => 'advanced', 'icon' => ''],
            ],
            'Frontend' => [
                ['name' => 'Vue.js', 'level' => 'advanced', 'icon' => ''],
                ['name' => 'JavaScript', 'level' => 'advanced', 'icon' => ''],
                ['name' => 'Bootstrap', 'level' => 'expert', 'icon' => ''],
                ['name' => 'HTML5 / CSS3', 'level' => 'expert', 'icon' => ''],
            ],
            'Database' => [
                ['name' => 'MySQL', 'level' => 'expert', 'icon' => ''],
                ['name' => 'Database Admin', 'level' => 'advanced', 'icon' => ''],
                ['name' => 'SQL Optimization', 'level' => 'intermediate', 'icon' => ''],
            ],
            'Tools & Practices' => [
                ['name' => 'Git / GitHub', 'level' => 'advanced', 'icon' => ''],
                ['name' => 'MVC Architecture', 'level' => 'expert', 'icon' => ''],
                ['name' => 'Role-Based Access', 'level' => 'advanced', 'icon' => ''],
                // TODO: Add more tools you use (Docker, Postman, VS Code extensions, etc.)
            ],
        ];

        $proficiencies = [
            ['name' => 'Laravel', 'percent' => 90],
            ['name' => 'PHP', 'percent' => 88],
            ['name' => 'Vue.js', 'percent' => 78],
            ['name' => 'MySQL', 'percent' => 85],
            ['name' => 'JavaScript', 'percent' => 75],
            ['name' => 'RESTful APIs', 'percent' => 88],
        ];

        $projects = [
            [
                'title' => 'FarmerHub – Agricultural Marketplace',
                'featured' => true,
                'problem' => 'Farmers and traders lacked a digital platform to list, discover, and purchase agricultural commodities while staying informed about real-time market prices.',
                'process' => 'Built a full-stack platform using PHP & MySQL for the backend and HTML/CSS/JS for the frontend. Designed a content-based recommendation engine to suggest relevant commodities based on user behavior and interests.',
                'outcome' => 'Delivered a production-ready marketplace that enables real-time commodity price updates, buy/sell listings, and intelligent recommendations — promoting digital agriculture for the farming community.',
                'stack' => ['PHP', 'MySQL', 'HTML', 'CSS', 'JavaScript', 'Recommendation Engine'],
            ],
            [
                'title' => 'Sargodha Marketplace – Local E-Commerce Platform',
                'featured' => true,
                'problem' => 'Local businesses in Sargodha City had no centralized digital storefront to reach customers online.',
                'process' => 'Collaborated as part of a development team to architect and build an e-commerce style web application covering the local marketplace. Implemented product listings, seller dashboards, and order management flows using Laravel and Vue.js.',
                'outcome' => 'Launched a fully operational local marketplace connecting buyers and sellers within Sargodha City, enabling digital commerce for local vendors.',
                'stack' => ['Laravel', 'Vue.js', 'MySQL', 'Bootstrap'],
            ],
            [
                'title' => 'Real-Time Chat Box (WebSocket)',
                'featured' => true,
                'problem' => 'The marketplace needed a live communication channel for buyers and sellers to negotiate and coordinate orders without leaving the platform.',
                'process' => 'Implemented a real-time bidirectional chat using WebSocket technology. Designed the message delivery system to handle concurrent connections and persist chat history in MySQL.',
                'outcome' => 'Zero-latency messaging between marketplace participants, increasing buyer-seller engagement and reducing external communication friction.',
                'stack' => ['Laravel', 'Web Sockets', 'MySQL', 'JavaScript'],
            ],
            [
                'title' => 'SAAS Sticky Notes App with Real-Time Reminders',
                'featured' => false,
                'problem' => 'Users needed a lightweight, embeddable productivity tool to create sticky notes and receive time-sensitive reminder notifications on any web platform.',
                'process' => 'Architected a SAAS application with a modular, embeddable design. Built a real-time notification engine that triggers alerts on the reminder datetime using server-sent events.',
                'outcome' => 'A plug-and-play SAAS module that can be integrated into third-party web applications, delivering live notifications with zero configuration overhead.',
                'stack' => ['Laravel', 'Vue.js', 'Real-time Notifications', 'SAAS Architecture'],
            ],
            [
                'title' => 'Administration Panel – RBAC Employee Management',
                'featured' => false,
                'problem' => 'Companies needed a secure, centralized dashboard to manage employee records, user permissions, and company data with strict access control.',
                'process' => 'Designed and developed a Laravel-based admin panel featuring role-based access control (RBAC). Implemented permission layers for different user roles and built CRUD interfaces for employee and user data management.',
                'outcome' => 'A secure, auditable administration system that reduced manual data management overhead and enforced strict data access policies across user roles.',
                'stack' => ['Laravel', 'PHP', 'MySQL', 'HTML', 'CSS', 'JavaScript', 'RBAC'],
            ],
            [
                'title' => 'School Management System',
                'featured' => false,
                'problem' => 'Schools relied on manual processes for student registration, attendance, timetables, fee collection, and result generation — leading to errors and inefficiency.',
                'process' => 'Built a comprehensive management system using PHP & MySQL with a multi-role access system for admins, teachers, students, and parents. Automated core administrative workflows end-to-end.',
                'outcome' => 'A fully automated school operations platform that streamlined daily administrative tasks, reduced paperwork, and improved data accuracy for all stakeholder roles.',
                'stack' => ['PHP', 'MySQL', 'HTML', 'CSS', 'JavaScript', 'Role-Based Access'],
            ],
        ];

        $experiences = [
            [
                'title' => 'Software Developer',
                'company' => 'MAAZ Informatics',
                'location' => '· Pakistan',
                'period' => 'Jan 2026 – Present',
                'description' => 'Working as a Full Stack Developer with expertise in Laravel and Database Administration. Collaborating with the team to develop, deploy, and maintain full-stack web applications using Laravel and Vue.js in a production environment.',
                'stack' => ['Laravel', 'Vue.js', 'MySQL', 'PHP', 'Database Admin'],
            ],
            [
                'title' => 'Laravel Developer (Trainee)',
                'company' => 'TechSwivel',
                'location' => '· Lahore, Pakistan',
                'period' => 'Aug 2025 – Nov 2025',
                'description' => 'Received professional training under a highly skilled Laravel development team. Built fully functional and scalable Laravel-based web applications. Gained hands-on experience in CRUD operations, authentication, API integration, MVC architecture, RESTful API development, and debugging in real-world client projects.',
                'stack' => ['Laravel', 'PHP', 'MySQL', 'REST APIs', 'MVC'],
            ],
            [
                'title' => 'Front-End Developer',
                'company' => 'HiSky Tech',
                'location' => '· Pakistan',
                'period' => 'Jan 2024 – Nov 2024',
                'description' => 'Developed responsive and dynamic web-based applications using advanced frontend technologies. Focused on delivering polished user interfaces and cross-browser compatible experiences over 11 months.',
                'stack' => ['HTML', 'CSS', 'JavaScript', 'Bootstrap', 'Responsive Design'],
            ],
        ];

        $certifications = [
            [
                'icon' => '',
                'title' => 'Generative AI Prompt Engineering',
                'issuer' => 'IBM / Coursera',
                'date' => 'May 2026',
                'description' => 'Completed IBM\'s Generative AI Prompt Engineering course — covering advanced prompting strategies, model behavior, and practical AI integration techniques.',
            ],
            [
                'icon' => '',
                'title' => 'Google SEO Fundamentals',
                'issuer' => 'Google / Coursera',
                'date' => 'May 2026',
                'description' => 'Earned expertise in on-page, off-page, and technical SEO — enabling optimized web application discoverability and search engine performance.',
            ],
            [
                'icon' => '',
                'title' => 'Trainee Laravel Developer',
                'issuer' => 'TechSwivel',
                'date' => 'Oct 2025',
                'description' => 'Certified after hands-on training in Laravel framework — covering CRUD operations, authentication, API integration, database management, and best coding practices.',
            ],
            [
                'icon' => '',
                'title' => 'Registration Officer',
                'issuer' => 'Local Government',
                'date' => 'Apr 2025',
                'description' => 'Certified for completing training as a Registration Officer — involving data collection, verification, record validation, and administrative documentation.',
            ],
        ];

        // TODO: Replace with real testimonials from supervisors, team leads, or clients.
        // You can request LinkedIn recommendations and paste the text here.
        $testimonials = [
            [
                'text' => 'Zain demonstrated exceptional problem-solving skills during his time at TechSwivel. His ability to pick up Laravel best practices quickly and contribute to real client projects was impressive for a trainee.',
                'name' => 'Senior Developer',
                'role' => 'TechSwivel, Lahore',
            ],
            [
                'text' => 'A reliable team player with a strong grasp of full-stack concepts. Zain\'s work on the chat module using WebSockets was technically sound and delivered on time.',
                'name' => 'Team Lead',
                'role' => 'MAAZ Informatics',
            ],
            [
                'text' => 'Zain\'s FarmerHub project stood out in our cohort — well-architected, functional, and solving a real problem for the farming community. Great attention to detail.',
                'name' => 'Project Supervisor',
                'role' => 'University of Sargodha',
            ],
        ];

        return view('home', compact(
            'skills',
            'proficiencies',
            'projects',
            'experiences',
            'certifications',
            'testimonials'
        ));
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:2000',
        ]);

        // TODO: Configure your mail settings in .env and enable the Mail::raw() line below.
        // Add MAIL_MAILER, MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD to .env
        // Uncomment the lines below once mail is configured:
        //
        // Mail::raw(
        //     "Name: {$validated['name']}\nEmail: {$validated['email']}\n\n{$validated['message']}",
        //     function ($message) use ($validated) {
        //         $message->to('zainaliasghar12@gmail.com')
        //                 ->subject("Portfolio Contact: {$validated['subject']}");
        //     }
        // );

        return back()->with('success', 'Thank you! Your message has been sent. I\'ll get back to you soon.');
    }
}
