<style>
.footer {
    background: #333;
    color: white;
    padding: 30px 15px;
    font-size: 12px;
}

.wrapper {
    max-width: 1100px;
    margin: auto;
}

.foot {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
}

h4 {
    font-size: 14px;
    margin-bottom: 10px;
    color: #ff6600;
}

p, li {
    font-size: 12px;
    line-height: 1.4;
    margin: 3px 0;
}

ul {
    list-style: none;
    padding: 0;
}

ul li {
    padding: 3px 0;
}



.facebook a {
    background-image: url('icons/facebook.png');
}

.twitter a {
    background-image: url('icons/twitter.png');
}

.googleplus a {
    background-image: url('icons/googleplus.png');
}

.contact a {
    background-image: url('icons/contact.png');
}

.copy_right {
    text-align: center;
    margin-top: 15px;
    font-size: 11px;
    border-top: 1px solid #555;
    padding-top: 10px;
}

/* Responsive Design */
@media screen and (max-width: 768px) {
    .section {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .social-icons ul {
        justify-content: center;
    }
}

</style>
<div class="footer">
    <div class="wrapper">
        <div class="foot">
            <div class="col">
                <h4>Information</h4>
                <p>At Pharma-C, we offer high-quality healthcare products, including prescription medications, wellness supplements, and medical equipment. We ensure affordability, reliability, and fast delivery for a seamless shopping experience.</p>
            </div>
            <div class="col">
                <h4>Our Hours</h4>
                <ul>
                    <li>Monday to Sunday</li>
                    <li>7:30 AM - 12:30 PM</li>
                </ul>
            </div>
            <div class="col">
                <h4>Developers</h4>
                <ul>
                    <li>Realino Peralta Jr.</li>
                    <li>Carem Trina Joana Rivera</li>
                    <li>Lhee Angelo Plamenco</li>
                    <li>Miguel Christopher Jose</li>
                </ul>
            </div>
            <div class="col">
                <h4>Contact</h4>
                <ul>
                    <li>0917-595-352</li>
                    <li>0927-307-6028</li>
                </ul>
                <div class="social-icons">
                    <h4>Follow Us</h4>
                    <ul>
                        <li class="facebook"><a href="#" target="_blank"></a></li>
                        <li class="twitter"><a href="#" target="_blank"></a></li>
                        <li class="googleplus"><a href="#" target="_blank"></a></li>
                        <li class="contact"><a href="#" target="_blank"></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="copy_right">
            <p>Web and Mobile Systems [2025]</p>
            <p>© Pharma-C &amp; All Rights Reserved.</p>
        </div>
    </div>
</div>
