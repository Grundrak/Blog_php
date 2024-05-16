<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>contact us</title>
  <link href="contact.css" rel="stylesheet">
</head>

<body class=" flex items-center justify-center h-screen">
  <div class="flex items-center justify-center  border bg-[#AD88C6]  w-2/5 mx-auto rounded-3xl ">

    <div class="mx-auto w-full  ">

        <h1 class="mb-2 p-6 items-center justify-center text-base text-centre flex font-bold text-white"> Contact Us</h1>
      <form action="" method="POST" class="px-20 py-14">
        <div >
          <label
          for="name"
          class=" block text-base font-medium text-white">
          Full Name
      </label>


          <input type="text" name="name" id="name"
            class="w-full h-9  border border-[#D9D9D9] bg-[#D9D9D9] text-base font-medium  outline-none focus:border-[#6A64F1] focus:shadow-md" />
        </div>

       
          <label for="Email" class=" block text-base font-medium text-white">
              Email
          </label>
          <input type="text" name="Email" id="Email"
              class="w-full h-9 border border-[#D9D9D9] bg-[#D9D9D9]   text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
   

    
          <label for="message" class="block text-base font-medium text-white">
              Message
          </label>
          <textarea rows="4" name="message" id="message"
              class="w-full h-32 resize-none  border border-[#D9D9D9] bg-[#D9D9D9] text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
   


      </form>
    </div>
  </div>
</body>

</html>