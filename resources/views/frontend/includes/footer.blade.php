<footer id="footer" class="py-5 bg-light">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-4">
                <div class="logo-box">
                    <h1>MAHADAN</h1>
                </div>
                <div class="about-box">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae voluptate doloribus illum
                    voluptatibus deserunt, velit iusto eos veritatis quis magnam dicta odio neque delectus quam sed eum
                    reiciendis. Doloremque, iste.
                </div>

            </div>
            
            <div class="col-md-4 text-end">
                <h2>Contact Us</h2>
                <ul>
                    <li>(+977-1234567890)</li>
                    <li>info@tiwari.com</li>
                    <li>Pokhara, Mahatgauda</li>
                    {{-- <li>Help Center</li> --}}
                </ul>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-md-12">
                <span>Copyright @ mahadan.com {{ \Carbon\Carbon::now()->format('Y') }}</span>
            </div>
        </div>
    </div>
</footer>
