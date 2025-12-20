class ImageService {
    /*
    * Implementation description
    * (frontend)
    * - Fix HTML for dropzone
    * - Import ImageService
    * - create instantiation
    * - Handle form submission
    * - add existImage for edit only
    * (backend)
    * - image Upload option
    * - change response type
    * */

    constructor(info) {
        /*Instantiate data*/
        this.formdata = new FormData();
        this.formId = '#'+info.formId;
        this.url = info.url;
        this.saveBtnId = info.saveBtnId || 'save'
        this.waitBtnId = info.waitBtnId || 'wait'

        /*Instantiate dropzone*/
        this.files = []
        this.addFile(info)

        let _self = this
        document.querySelector(this.formId).addEventListener("submit", function(e){
            _self.validate();
        });


    }
    addFile(info) {

        let dropzoneId = '#' + info.dropzoneId;
        let inputName = info.inputName;
        let existImage = this.existImage = info.existImage || null
        let accept = info.accept || 'image'
        let nullable = info.nullable || info.existImage || false
        let limit = info.limit || 10
        let validation = info.validation || null

        let mime = this.typeConversion(accept)
        let self = this

        Dropzone.autoDiscover = false;
        let avatar =   new Dropzone(dropzoneId, {
            url: "/",
            autoProcessQueue: false,
            maxFilesize: 10,
            maxFiles: 1,
            acceptedFiles: mime.mimeAccept,
            thumbnailWidth: 100,
            thumbnailHeight: 100,
            addRemoveLinks: true,
            init: function () {

                this.on("addedfile", file => {

                    /*Keep only single image at a time*/
                    if (this.files.length > 1) {
                        this.removeFile(this.files[0]);
                    }
                    let image = this.files[0];
                    /* Validate File type */
                    let errorMessage = self.validation(image,mime,limit)

                    if (!errorMessage) {
                        $('#error_' + inputName).html('')
                        if(typeof image == 'object'){
                            /*Update Thumb image */
                            self.updateThumb(accept,dropzoneId)

                            /*Add selected image to form data */
                            self.formdata.set(inputName, file)
                        }
                    } else {
                        this.removeFile(this.files[0]);
                        $('#error_' + inputName).html(errorMessage)
                    }

                });

            }
        });

        if(existImage){
            avatar.displayExistingFile({}, existImage);
            if(accept !== 'image'){
                this.updateThumb(accept,dropzoneId)
            }
        }

        setTimeout(function (){
            $(`.dz-image img`).attr('alt','')
        },2000)

        this.files.push({
            'inputName' : inputName,
            'image' : avatar,
            'mime' : mime,
            'existImage' : existImage,
            'nullable' : nullable,
            'limit' : limit,
            'validation' : validation,
        })

    }

    updateThumb(type,dropzoneId){
        let url = null;
        if(type == 'audio'){
            url = '/campus/assets/img/logo/audio.png'
        }else if(type == 'ppt'){
            url = '/campus/assets/img/logo/ppt.png'
        }else if(type == 'pdf'){
            url = '/campus/assets/img/logo/pdf.png'
        }else if(type == 'doc'){
            url = '/campus/assets/img/logo/doc.png'
        }else if(type == 'xls'){
            url = '/campus/assets/img/logo/excel.png'
        }else if(type == 'video'){
            url = '/campus/assets/img/logo/video.png'
        }else if(type == 'mix'){
            url = '/campus/assets/img/logo/file.png'
        }
        if(url){
            let self = this
            setTimeout(function (){
                $(`${dropzoneId} img`).attr('src',url)
            },100)
        }

    }
    submit(){
        let self = this
        let req = null;
        /* Image Validation */
        let errorMessage = this.validate();


        if(!errorMessage){
            var inputData = $(this.formId).serializeArray();
            $.each(inputData,function(key,input){
                self.formdata.append(input.name,input.value);
            });
            self.formdata.set('draw','true');

            this.loading()

            req = new Promise((resolve, reject) => {

                $.ajax({
                    method: "POST",
                    url: this.url,
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    data: this.formdata,
                    success: function (data) {

                        if(data.status){
                            if(data.redirect){
                                window.location.href = data.redirect
                            }else{
                                self.loading(false)

                            /*Reset form*/
                            if(!self.existImage){
                                document.querySelector(self.formId).reset();
                            }

                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 5000
                            });

                            Toast.fire({icon: 'success', title: data.message})

                            /*Clean dropzone image*/
                            if(!self.existImage){
                                self.files.forEach((file)=>{
                                    file.image.removeAllFiles();
                                })
                            }

                            resolve(data);

                            }

                        }else{
                            self.loading(false)
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 5000
                            });
                            Toast.fire({icon: 'error', title: data.message})

                        }
                    },
                    error: function(jqXhr, json, errorThrown){// this are default for ajax errors
                        self.loading(false)
                        var errors = jqXhr.responseJSON;
                        var errorsHtml = '';
                        $.each(errors['errors'], function (index, value) {
                            $('#error_'+index).html(value[0])
                        });

                        resolve({'status':false});
                    }
                })

            });

        }

        return req

    }

    validation(image,mime,limit=10){
        let errorMessage = null ;

        if(image && image.size > (limit* 1048576)){
            errorMessage = `File must be less than ${limit}MB`
        }
        if(image && !mime.mimeType.includes(image.type.split("/")[1])){
            let types = ''
            mime.mimeName.forEach((type)=>{
                types += type + ', '
            })
            errorMessage = "File acceptable format " + types.replace(/,\s*$/, "");
        }

        return errorMessage;
    }

    loading(start = true){

        if(start){
            $(`#${this.saveBtnId}`).hide()
            $(`#${this.waitBtnId}`).show()
        }else{
            $(`#${this.saveBtnId}`).show()
            $(`#${this.waitBtnId}`).hide()
        }
        return 1;
    }

    typeConversion(accept){
        let mimeAccept = '.jpg,.jpeg,.png,.webp'
        let mimeType = ['jpg','jpeg','png','webp']
        let mimeName = ['jpg','jpeg','png','webp']

        if(accept == 'image'){
            mimeAccept = '.jpg,.jpeg,.png,.webp'
            mimeType = ['jpg','jpeg','png','webp']
            mimeName = ['jpg','jpeg','png','webp']
        }else if(accept == 'audio'){
            mimeAccept = '.mp3,.wav,.wma,.acc'
            mimeType = ['mpeg','wav','wma','acc']
            mimeName = ['mp3','wav','wma','acc']
        }else if(accept == 'pdf'){
            mimeAccept = '.pdf'
            mimeType = ['pdf']
            mimeName = ['pdf']
        }else if(accept == 'ppt'){
            mimeAccept = '.ppt, .pptx'
            mimeType = ['vnd.ms-powerpoint','vnd.openxmlformats-officedocument.presentationml.presentation']
            mimeName = ['ppt', 'pptx']
        }else if(accept == 'doc'){
            mimeAccept = '.doc'
            mimeType = ['msword']
            mimeName = ['doc']
        }else if(accept == 'xls'){
            mimeAccept = '.xls,.xlsx,.csv'
            mimeType = ['vnd.openxmlformats-officedocument.spreadsheetml.sheet','vnd.ms-excel','csv']
            mimeName = ['xls','xlsx','csv']
        }else if(accept == 'mix'){
            mimeAccept = '.jpg,.jpeg,.png,.webp,.xls,.xlsx,.csv,.pdf,.ppt,.doc'
            mimeType = ['jpg','jpeg','png','webp','vnd.openxmlformats-officedocument.spreadsheetml.sheet','vnd.ms-excel','csv','pdf','vnd.ms-powerpoint','msword']
            mimeName = ['jpg','jpeg','png','webp','xls','xlsx','csv','pdf','ppt','doc']
        }else{
            mimeAccept = '.jpg,.jpeg,.png,.webp'
            mimeType = ['jpg','jpeg','png','webp']
            mimeName = ['jpg','jpeg','png','webp']
        }

        return {
            'mimeAccept' : mimeAccept,
            'mimeType' : mimeType,
            'mimeName' : mimeName,
        }
    }

    validate(){
        let errorMessage = null;

        this.files.forEach((file)=>{
            let localFile = this.formdata.get(file.inputName);
            if(!file.nullable){
                if(!localFile){
                    if(file.validation && file.validation.required){
                        errorMessage = file.validation.required
                    }else{
                        errorMessage = `Please choose an image`
                    }

                }else{
                    errorMessage = this.validation(localFile,file.mime,file.limit)
                }
            }
            if(errorMessage){
                $('#error_'+file.inputName).html(errorMessage)
            }
        })

        return errorMessage
    }
}
