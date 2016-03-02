<template>
    <span class="editable" 
        @dblclick="startEditing"
        @click.prevent.stop
        :class="{'-visible': !editing, '-hidden': editing}">
        {{ value || placeholder || 'Enter ' + (key || 'text') }}
        <textarea class="editable__input"
               placeholder="{{ placeholder || 'Enter ' + (key || 'text') }}"
               v-model="value"
               :class="{'-visible': editing, '-hidden': !editing}"
               @dblclick.stop
               @blur="finishEditing(value)"
               @keyup.enter="blur()"
               @keyup.esc="cancelEditing"></textarea>
    </span>
</template>

<script>
    export default {
        props: ['model', 'rowId', 'key', 'value', 'placeholder'],
        data() {
            return {
                editing: false,
            }
        },
        methods: {
            startEditing() {
                this.editing = true;
                var el = event.target.querySelector('.editable__input');
                this.$nextTick(function () {
                    el.focus();
                });
            },
            finishEditing() {
                this.editing = false;

                var resource = this.$resource('/edit/{model}/{id}/');
                resource.update({model: this.model, id: this.rowId}, { [this.key]: this.value});
            },
            cancelEditing() {
                this.editing = false;
            },
            blur() {
                var el = event.target;
                el.blur();
            }
        }
    }
</script>