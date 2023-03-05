/*----------------------------------------------------*/
/*----------------------------------------------------*/
//      01. Initiate Datatable 
//      02. Delete Datatable item
/*----------------------------------------------------*/
/*----------------------------------------------------*/


/*  01. Initiate Datatable */

function jsDataTable(id, title) {


    $('#' + id).DataTable({
        dom: 'B<"clear">lfrtip',
        processing: true,
        pagingType: 'full_numbers',
        ordering: true,
        buttons: [
            { extend: 'copy', className: 'button' },
            { extend: 'excel', className: 'button', text: 'Save as Excel' },
            { extend: 'pdf', className: 'button', text: 'Save as Pdf' },
        ]
    });

}


/*  02. Delete Datatable item */

function deleteSingleItem(form) {
    if (form) {
        Swal.fire({
            title: 'Delete !',
            text: "Are you sure you want to delete? You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        })
    }
}