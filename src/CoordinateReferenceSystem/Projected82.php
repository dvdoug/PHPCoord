<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateReferenceSystem;

/**
 * @internal use all methods and constants directly from the Projected class e.g. Projected::EPSG_*, Projected::fromSRID()
 * This will be removed and folded back into the main class once support for PHP <8.2 is dropped
 */
class Projected82 extends ProjectedBase
{
    use ProjectedConstantsChunk1;
    use ProjectedConstantsChunk2;
    use ProjectedConstantsChunk3;
    use ProjectedConstantsChunk4;
}
