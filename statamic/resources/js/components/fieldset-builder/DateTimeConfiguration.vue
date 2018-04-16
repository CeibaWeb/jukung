<template>
    <div class="form-group">
        <label class="block">{{ translate('cp.date_and_time') }}</label>
        <small class="help-block">{{ translate('cp.fieldset_date_and_time_instructions') }}</small>
        <toggle-fieldtype :data.sync="shouldCustomize"></toggle-fieldtype>

        <div v-if="shouldCustomize" class="row mt-16">
            <div class="form-group col-md-6">
                <label class="block" v-text="getConfigField('allow_time').display"></label>
                <small class="help-block" v-html="getConfigField('allow_time').instructions"></small>
                <toggle-fieldtype :data.sync="date.allow_time"></toggle-fieldtype>
            </div>
            <div class="form-group col-md-6">
                <label class="block" v-text="getConfigField('require_time').display"></label>
                <small class="help-block" v-html="getConfigField('require_time').instructions"></small>
                <toggle-fieldtype :data.sync="date.require_time"></toggle-fieldtype>
            </div>

        </div>
    </div>
</template>

<script>
export default {

    props: {
        date: Object
    },

    data() {
        return {
            shouldCustomize: this.date != null
        }
    },

    computed: {

        fieldtypeConfig() {
            return _.findWhere(this.$parent.fieldtypes, { name: 'date' }).config;
        }

    },

    watch: {

        shouldCustomize(value) {
            // When the option to customize is toggled on, we'll initialize with the defaults.
            this.date = (value === false) ? false : {
                allow_time: true,
                require_time: false
            };
        }

    },

    methods: {

        getConfigField(name) {
            return _.findWhere(this.fieldtypeConfig, { name });
        }

    }

}
</script>
