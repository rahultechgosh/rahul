<style>
    .footer {
        margin-top: 5rem;
        background-color: #1a1a1a;
        color: #ffffff;
        padding: 3rem 0;
        font-family: 'Arial', sans-serif;
    }
    
    .footer-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 2rem;
    }
    
    .footer-section h3 {
        color: #fff;
        font-size: 1.2rem;
        margin-bottom: 1.2rem;
    }
    
    .footer-section ul {
        list-style: none;
        padding: 0;
    }
    
    .footer-section ul li {
        margin-bottom: 0.8rem;
    }
    
    .footer-section ul li a {
        color: #b0b0b0;
        text-decoration: none;
        font-size: 0.9rem;
        transition: color 0.3s;
    }
    
    .footer-section ul li a:hover {
        color: #ffffff;
    }
    
    .footer-bottom {
        margin-top: 2rem;
        padding-top: 1rem;
        border-top: 1px solid #333;
        text-align: center;
    }
    .brand-name {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.5rem;
        font-weight: bold;
        color: #ffffff;
        cursor: pointer;
    }
</style>

<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-section brand-name" onclick="window.location.href='/trial/index.php';">
                QUERIES HUB
            </div>
            <div class="footer-section">
                <h3>Categories</h3>
                <ul>
                    <li><a href="/technology">Technology</a></li>
                    <li><a href="/programming">Programming</a></li>
                    <li><a href="/web-development">Web Development</a></li>
                    <li><a href="/database">Database</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Trending Blogs</h3>
                <ul>
                    <li><a href="/blogs/trending">Latest Posts</a></li>
                    <li><a href="/blogs/most-viewed">Most Viewed</a></li>
                    <li><a href="/blogs/featured">Featured Articles</a></li>
                    <li><a href="/blogs/top-rated">Top Rated</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="/about-us">About Us</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                    <li><a href="/privacy-policy">Privacy Policy</a></li>
                    <li><a href="/terms">Terms of Service</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Connect With Us</h3>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">LinkedIn</a></li>
                    <li><a href="#">Instagram</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>© 2025 Queries Hub | All rights reserved</p>
        </div>
    </div>
</footer>