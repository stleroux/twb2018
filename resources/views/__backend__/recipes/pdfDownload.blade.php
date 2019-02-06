<table border="0" cellpadding="0" cellspacing="0">
   <thead>
      <tr style="background-color: #C0C0C0">
         <td colspan="2">Recipes</td>
      </tr>
   </thead>
   <tbody>
      
      @foreach ($recipes as $key => $recipe)
         <tr>
            <td>
               <table border="1" cellpadding="0" cellspacing="0">
                  <tr>
                     <td width="25%" style="background-color: lightgrey">No</td>
                     <td>{{ ++$key }}</td>
                  </tr>
                  <tr>
                     <td nowrap="nowrap" style="vertical-align: text-top; background-color: lightgrey;">Title</td>
                     <td>{{ $recipe->title }}</td>
                  </tr>
                  <tr>
                     <td nowrap="nowrap" style="vertical-align: text-top; background-color: lightgrey;">Prep Time</td>
                     <td>{{ $recipe->prep_time }}</td>
                  </tr>
                  <tr>
                     <td nowrap="nowrap" style="vertical-align: text-top; background-color: lightgrey;">Servings</td>
                     <td>{{ $recipe->servings }}</td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr>
            <td>&nbsp;</td>
         </tr>
      @endforeach
   </tbody>
</table>
