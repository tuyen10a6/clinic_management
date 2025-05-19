import "select2"

const keDonThuoc = {
    unit() {
        this.select2()
        this.addRow()
        this.removeRow()
    },

    select2() {
        $('.js-select2').select2();
    },

    addRow() {
        $('#add-row').on('click', function () {
            var dadFullItem = $('.dad-full-item');
            var itemChild = dadFullItem.find('.child-item').first();
            var cloned = itemChild.clone();

            let index = dadFullItem.find('.child-item').length;

            cloned.find('select, input').each(function () {
                $(this).val('');
            });

            cloned.find('select, input').each(function () {
                let name = $(this).attr('name');
                if (name) {
                    name = name.replace(/\[\d+\]/, `[${index}]`);
                    $(this).attr('name', name);
                }
            });

            cloned.find('select.js-select2').removeClass('select2-hidden-accessible').next('.select2').remove();

            dadFullItem.append(cloned);

            cloned.find('.js-select2').select2();
        });
    },

    removeRow() {
        $(document).on('click','.remove-row',function(){

            var countRow = $('.child-item').length;
            if(countRow === 1){
                alert("Xoá không thành công! Phải có ít nhất 1 dòng dữ liệu")
                return;
            }else
             var rowRemove = $(this).closest('.child-item');
             rowRemove.remove()
        });
    }
}
$(function () {
    keDonThuoc.unit()
})
