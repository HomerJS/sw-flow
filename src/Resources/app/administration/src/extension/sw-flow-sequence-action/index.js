import { ACTION, GROUP } from '../../constant/create-tag-action.constant';

const { Component } = Shopware;

Component.override('sw-flow-sequence-action', {
    computed: {
        // Not necessary if you use an existing group
        // Push the `groups` method in computed if you are defining a new group
        groups() {
            this.actionGroups.unshift(GROUP);

            return this.$super('groups');
        },

        modalName() {
            if (this.selectedAction === ACTION.CREATE_TAG) {
                return 'sw-flow-create-tag-modal';
            }

            return this.$super('modalName');
        },
    },

    methods: {
        getActionDescriptions(sequence) {
            if(sequence.actionName === ACTION.CREATE_TAG){
                return this.getCreateTagDescription(sequence.config)
            }
            return this.$super('getActionDescriptions', sequence)
        },

        getCreateTagDescription(config) {
            const tags = config.tags.join(', ');

            return this.$tc('create-tag-action.descriptionTags', 0, {
                tags
            });
        },

        getActionTitle(actionName) {
            if (actionName === ACTION.CREATE_TAG) {
                return {
                    value: actionName,
                    icon: 'regular-tag',
                    label: this.$tc('create-tag-action.titleCreateTag'),
                    group: GROUP,
                }
            }

            return this.$super('getActionTitle', actionName);
        },
    },
});