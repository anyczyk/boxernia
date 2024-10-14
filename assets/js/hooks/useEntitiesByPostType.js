import { useSelect } from '@wordpress/data';

export function useEntitiesByPostType( postType, params ) {
	const { entities, isResolvingEntities, hasResolvedEntities } = useSelect(
		( select ) => {
			const {
				getEntityRecords,
				isResolving,
				hasFinishedResolution,
			} = select( 'core' );

			const entitiesParameters = [
				'postType',
				postType || 'page',
				params || {
					parent: 0,
					order: 'asc',
					orderby: 'id',
					per_page: -1,
				},
			];

			return {
				entities: getEntityRecords( ...entitiesParameters ) || null,
				isResolvingEntities: isResolving(
					'getEntityRecords',
					entitiesParameters
				),
				hasResolvedEntities: hasFinishedResolution(
					'getEntityRecords',
					entitiesParameters
				),
			};
		},
		[ postType, params ]
	);

	return {
		entities,
		isResolvingEntities,
		hasResolvedEntities,
		hasEntities: !! ( hasResolvedEntities && entities?.length ),
	};
}
