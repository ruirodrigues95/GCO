<template>
    <div>
        <div v-if="" class="alert alert-success alert-dismissible fade container show text-center mt-4 mb-0" role="alert">
            <label class="my-0">{{ status }}</label>
            <button ref="buttonAlert" type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div v-show="flag" ref="errorAlert" class="alert alert-danger alert-dismissible fade container show text-center mt-4 mb-0" role="alert">
            <label class="my-0">There is a minimum of 5 questions.</label>
        </div>

        <div class="text-center">
            <h2 class="mb-5 mt-3">Quiz Creation</h2>
        </div>
        <form :action="link" method="post"  ref="formQA" class="col-6 mx-auto form-QA">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="lessonID" :value="lessonId">

            <div v-for="question in questions" class="mb-5">
                <div class="form-group mt-5">
                    <label for="question">Question {{question}}</label>
                    <input type="text" class="form-control" required :id="'question' + question" :name="'question' + question" aria-describedby="Question" :placeholder="'Question'" value="">
                </div>
                <div v-for="index in 4" :key="index" class="form-group mb-0 ml-3 ">
                    <label :for="'answer'+ question + '.' + index">Answer {{question + '.' + index+1}}</label>
                    <input type="text" class="form-control" required :id="'answer'+ question + '.' + index" :name="'answer'+ question + '.' + index" :placeholder="'Answer'" value="">
                    <div class="text-right mt-2 mr-2">
                        <input type="radio" :id="'answer'+ question + index" :checked="index==1" :name="'correct'+ question" :value="index">
                        <label :for="'answer'+ question + index"> Correct One</label>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mb-5 mt-5">
                <div class="ml-2">
                    <button type="button" ref="buttonAdd" class="btn btn-add" @click.prevent="addQuestion">Add</button>
                    <button type="button" class="btn btn-danger" @click.prevent="removeQuestion">Remove</button>
                </div>
                <div class="mr-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>

export default {
    name : 'create-questions',
    data(){
        return {
            index: 5,
            flag: false,
            questions: [1,2,3,4,5],
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    props: {
        status:{
            type: String,
            required: true
        },
        lessonId:{
            type: Number,
            required: true
        },
        link:{
            type: String,
            required: true
        }
    },
    methods: {
        addQuestion() {
            this.index++
            this.questions.push(this.index)

            this.flag = false
            this.$refs.buttonAdd.scrollIntoView()

            if (this.$refs.buttonAlert){
                this.$refs.buttonAlert.click()
            }
        },
        removeQuestion(){
            if (this.index>5){
                this.index--
                this.questions.pop()
            }else{
                this.flag = true
                window.scroll(0,0);
            }

            if (this.$refs.buttonAlert){
                this.$refs.buttonAlert.click()
            }
        }
    }
}
</script>

<style>

.btn-add{
    background-color: gray;
    color: white;
    opacity: 0.85;
}

.btn-add:hover{
    color: white;
    opacity: 1;
}

</style>
