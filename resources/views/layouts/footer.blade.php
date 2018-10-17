

<footer>
    <div class="container-fluid px-4 pt-5" id="footer-container">
        <div class="row px-md-5 ml-md-5">
            <div class="col-md-5 col-lg-6">
                <p class="footer-title">About Us</p>
                <p class="footer-text">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias officiis cum illurem ex one
                    quisquam, minus fugiat natus
                    esse. Nulla, consequuntur at!
                </p>
                <p class="footer-text">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias accusamus omgiat natus esse.
                    Nulla, consequuntur at!
                </p>
            </div>
            <!-- About Us -->

            <div class="col-md-4 col-lg-3 ">
                <p class="footer-title mb-1">Contacts</p>
                <i class="fas fa-phone footer-text mr-2 mt-3"></i>
                <span class="footer-text">(777) 777-7777</span>
                <br>
                <i class="fas fa-map-marker-alt footer-text mr-2 mt-3"></i>
                <span class="footer-text">Unit-A Blk 3 Lot 5 Tongguiao St, BF Int'l Las Piñas City
                        <br>
                        <i class="fas far fa-envelope footer-text mr-2 mt-3"></i>
                        <span class="footer-text">philcafe@daum.net</span>
                </span>
            </div>

            <!-- Contacts -->

            <div class="col-md-3 col-lg-3 pt-4 pt-md-0">
                <p class="footer-title mb-2">Links</p>
                <a href="#">
                    <i class="fab fa-facebook-square footer-text fa-2x mr-1"></i>
                </a>
                <a href="#">
                    <i class="fab fa-twitter-square footer-text fa-2x mr-1"></i>
                </a>
                <a href="#">
                    <i class="fab fa-youtube footer-text fa-2x mr-1"></i>
                </a>
                </p>
                <!-- Links -->
            </div>
            <div class="col-sm-12">
                <hr style="border-top: 1px solid #c3c3c3;">
            </div>
            <!-- Horizontal Line -->
        </div>

        <!-- row -->
        <div class="row px-md-5 ml-md-5">
            <div class="col-sm-12 pb-4">
                <p class="footer-text text-center text-sm-left">Copyright &copy; Philcafe 2018</p>
            </div>
            <!-- Copyright -->
        </div>
    </div>
    <!-- footer container-fluid -->

</footer>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="  crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>



<script>
    // FOR SHOW/HIDE PICTURE
    var number = 0;
    var btn =  document.getElementById('show_hide');
    var down = document.getElementById('down');
    var up = document.getElementById('up');
  
    
    console.log(down, up);
   
   function showhide(){
        number++;

        var image_container =  document.getElementById('image_container');

        for (let i = 1; i <= 100; i++) {
           if (number %2 == 0) {
                image_container.setAttribute('class', 'd-none');
                btn.setAttribute('value', 'Show image/file');
                up.style.cssText = "display: none";
                down.style.cssText = "display: inline";

            }else{
                image_container.setAttribute('class', 'd-block');
                btn.setAttribute('value', 'Hide image/file');
                up.style.cssText = "display: inline";
                down.style.cssText = "display: none";
           }
        }
    }

</script>

{{-- <script>

        // $(document).ready(function(){
         
        //     $("#update-image").click(function(){
        //         // alert('working');

        //         $.ajax({
        //             type: "get",
        //             url: {{ route("delete_image", ['document_srl' => $document_srl]) }},
        //             success: function(){
        //                 console.log("SUCCESS")
        //             }
        //         })
        //     })
        // });
    
</script> --}}

</body>

</html>

