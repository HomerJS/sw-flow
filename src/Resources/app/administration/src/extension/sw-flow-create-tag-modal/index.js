const { Component } = Shopware;

Component.register('sw-flow-sequence-action', {
    methods: {
        openDynamicModal(value) {
            if (!value) {
                return;
            }

            const actionName = this.flowBuilderService.getActionName('CREATE_TAG');

            if (value === actionName) {
                this.selectedAction = actionName;
                const config = {
                    tagIds: {
                        'tag_id_1': 'Vip',
                        'tag_id_2': 'New Customer',
                    },
                };

                // Config can be a result from an API.
                this.onSaveActionSuccess({ config });
                return;
            }

            // handle for the rest of actions.
        },
    },
});