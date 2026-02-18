<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuildersCo | Feed</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #1a1d23;
            --accent: #f39c12;
            --bg: #f0f2f5;
            --white: #ffffff;
            --border: #ddd;
            --text-main: #050505;
            --text-secondary: #65676b;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg);
            margin: 0;
            color: var(--text-main);
        }

        /* --- ENLARGED & COOL NAVBAR --- */
        .navbar {
            background: var(--primary);
            color: white;
            padding: 20px 0; /* Larger Navbar */
            position: sticky;
            top: 0;
            z-index: 1000;
            
            /* High-end layered shadow for depth */
            box-shadow: 
                0 4px 6px -1px rgba(0, 0, 0, 0.2), 
                0 2px 4px -1px rgba(0, 0, 0, 0.1),
                0 10px 15px -3px rgba(0, 0, 0, 0.2);

            /* Subtle top-light rim to make it pop */
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .nav-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 2fr 1fr;
            align-items: center;
            padding: 0 20px;
        }

        /* Swapped: Logo on Left, Brand in Center */
        .nav-left { display: flex; align-items: center; justify-content: flex-start; }
        .nav-left i { font-size: 2.2rem; color: var(--accent); }

        .nav-center { text-align: center; }
        .logo-text-center { 
            color: white; 
            margin: 0; 
            letter-spacing: 4px; 
            font-size: 2rem; 
            text-transform: uppercase; 
            font-weight: bold;
        }

        .nav-right {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        /* --- EXPANDING LOGOUT MENU --- */
        .expanding-logout {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            height: 50px;
            width: 50px;
            display: flex;
            align-items: center;
            overflow: hidden;
            transition: width 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), background 0.3s;
            text-decoration: none;
            color: white;
        }

        .menu-inner {
            display: flex;
            align-items: center;
            padding: 0 16px;
            white-space: nowrap;
        }

        .menu-inner i { font-size: 1.3rem; }

        .menu-text {
            opacity: 0;
            margin-left: 0;
            font-weight: 600;
            font-size: 1rem;
            transition: opacity 0.3s, margin-left 0.3s;
        }

        .expanding-logout:hover {
            width: 135px;
            background: #e74c3c;
        }

        .expanding-logout:hover .menu-text {
            opacity: 1;
            margin-left: 12px;
        }

        /* --- MAIN LAYOUT --- */
        .main-layout {
            max-width: 1200px;
            margin: 25px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 25px;
        }

        /* --- SIDEBAR --- */
        .profile-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid var(--border);
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }

        .profile-banner { height: 70px; background: var(--primary); }
        .profile-info { padding: 0 20px 20px; text-align: center; margin-top: -40px; }
        .profile-avatar { width: 80px; height: 80px; border-radius: 50%; border: 4px solid white; background: #eee; }

        .stats-row {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
            font-size: 0.9rem;
        }

        /* Side-by-side expanding buttons */
        .sidebar-actions { 
            display: flex; 
            flex-direction: row; 
            justify-content: center;
            gap: 10px; 
            margin-top: 15px;
        }

        .action-link {
            text-decoration: none;
            background: var(--primary);
            color: white;
            border-radius: 25px;
            height: 45px;
            width: 45px; 
            display: flex;
            align-items: center;
            justify-content: flex-start;
            overflow: hidden;
            transition: width 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid var(--primary);
        }

        .action-link.secondary {
            background: white;
            color: var(--primary);
        }

        .action-content {
            display: flex;
            align-items: center;
            padding-left: 14px;
            white-space: nowrap;
        }

        .action-label {
            opacity: 0;
            font-weight: bold;
            font-size: 0.9rem;
            margin-left: 0;
            transition: opacity 0.2s, margin-left 0.2s;
        }

        .action-link:hover {
            width: 140px; 
        }

        .action-link:hover .action-label {
            opacity: 1;
            margin-left: 10px;
        }

        /* --- FEED SECTION --- */
        .create-post {
            background: white;
            border-radius: 8px;
            padding: 12px 16px;
            border: 1px solid var(--border);
            margin-bottom: 16px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }

        .post-prompt {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 12px;
            border-bottom: 1px solid #f0f2f5;
        }

        .post-prompt input {
            flex: 1;
            background: #f0f2f5;
            border: none;
            padding: 10px 15px;
            border-radius: 20px;
            font-size: 1rem;
            outline: none;
        }

        .post-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 8px;
        }

        .option-group { display: flex; gap: 5px; }

        .btn-text {
            background: none;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            color: var(--text-secondary);
            font-weight: 600;
            cursor: pointer;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-text:hover { background: #f2f2f2; }

        .btn-post-submit {
            background: var(--primary);
            color: white;
            border: none;
            padding: 6px 20px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        .post-card {
            background: white;
            border-radius: 8px;
            border: 1px solid var(--border);
            margin-bottom: 16px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }

        .post-header {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
        }

        .avatar { width: 40px; height: 40px; border-radius: 50%; object-fit: cover; }
        
        .user-meta h4 { margin: 0; font-size: 0.95rem; }
        .user-meta small { color: var(--text-secondary); font-size: 0.8rem; }

        .post-content {
            padding: 4px 16px 16px 16px;
            font-size: 0.95rem;
        }

        .post-footer {
            display: flex;
            justify-content: space-around;
            padding: 4px 0;
            margin: 0 16px;
            border-top: 1px solid #ebedf0;
        }

        .post-footer button {
            flex: 1;
            background: none;
            border: none;
            padding: 8px;
            margin: 4px 0;
            border-radius: 4px;
            color: var(--text-secondary);
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .post-footer button:hover { background: #f2f2f2; }

    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-content">
            <div class="nav-left">
                <i class="fas fa-hard-hat"></i>
            </div>

            <div class="nav-center">
                <h1 class="logo-text-center">BUILDERSCO</h1>
            </div>

            <div class="nav-right">
                <a href="login.html" class="expanding-logout">
                    <div class="menu-inner">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="menu-text">Logout</span>
                    </div>
                </a>
            </div>
        </div>
    </nav>

    <div class="container main-layout">
        <aside class="sidebar-left">
            <div class="profile-card">
                <div class="profile-banner"></div>
                <div class="profile-info">
                    <img src="https://via.placeholder.com/80" alt="Profile" class="profile-avatar">
                    <h3>Juan Dela Cruz</h3>
                    <p>Civil Engineer</p>
                    <hr>
                    <div class="stats-row"><span>Projects</span><strong>14</strong></div>
                    <div class="stats-row"><span>Followers</span><strong>1.2k</strong></div>
                    
                    <div class="sidebar-actions">
                        <a href="user_profile.php" class="action-link">
                            <div class="action-content">
                                <i class="fas fa-user"></i>
                                <span class="action-label">Profile</span>
                            </div>
                        </a>
                        <a href="user_store.php" class="action-link secondary">
                            <div class="action-content">
                                <i class="fas fa-tools"></i>
                                <span class="action-label">Store</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            </aside>

        <main class="feed-section">
            <section class="create-post">
                <div class="post-prompt">
                    <img src="https://via.placeholder.com/40" alt="User" class="avatar">
                    <input type="text" placeholder="What are you building today, Juan?">
                </div>
                <div class="post-options">
                    <div class="option-group">
                        <button class="btn-text"><i class="fas fa-image" style="color: #45bd62;"></i> Photo/video</button>
                        <button class="btn-text"><i class="fas fa-user-tag" style="color: #1877f2;"></i> Tag Friends</button>
                        <button class="btn-text"><i class="fas fa-smile" style="color: #f7b928;"></i> Feeling</button>
                    </div>
                    <button class="btn-post-submit">Post</button>
                </div>
            </section>

            <div class="feed-container">
                <article class="post-card">
                    <div class="post-header">
                        <img src="https://via.placeholder.com/40" alt="User" class="avatar">
                        <div class="user-meta">
                            <h4>Engr. Juan Dela Cruz</h4>
                            <small>Just now • <i class="fas fa-globe-asia"></i></small>
                        </div>
                    </div>
                    <div class="post-content">
                        <p>Updating the site layout for a better experience. 🛠️ #Engineering #WebDev</p>
                    </div>
                    <div class="post-footer">
                        <button><i class="far fa-thumbs-up"></i> Like</button>
                        <button><i class="far fa-comment"></i> Comment</button>
                        <button><i class="far fa-share-square"></i> Share</button>
                    </div>
                </article>
            </div>
        </main>
    </div>

</body>
</html>