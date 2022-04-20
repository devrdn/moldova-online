<div class="container">
   <div class="add_post">
      <h1>Add Post</h1>
      
   </div>
   <div class="posts">
      <table>
         <thead>
            <tr>
               <th>Post ID</th>
               <th>Автор</th>
               <th>Название</th>
               <th>Дата публикации</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td>1</td>
               <td>Author</td>
               <td>Title</td>
               <td><?=date("Y-m-d", time());?></td>
            </tr>
         </tbody>
      </table>
   </div>
</div>