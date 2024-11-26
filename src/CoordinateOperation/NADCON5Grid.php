<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\CoordinateOperation;

use UnexpectedValueException;

class NADCON5Grid extends Grid
{
    use BiquadraticInterpolation;

    private string $gridDataType;

    public function __construct(string $filename)
    {
        $this->gridFile = new GridFile($filename);

        $header = $this->getHeader();
        $this->startX = $header['xlonsw'];
        $this->startY = $header['xlatsw'];
        $this->columnGridInterval = $header['dlon'];
        $this->rowGridInterval = $header['dlat'];
        $this->numberOfColumns = $header['nlon'];
        $this->numberOfRows = $header['nlat'];

        $this->gridDataType = match ($header['ikind']) {
            1 => 'G',
            default => throw new UnexpectedValueException("Unknown ikind: {$header['ikind']}"),
        };
    }

    protected function getRecord(int $longitudeIndex, int $latitudeIndex): GridValues
    {
        $startBytes = 52;
        $dataTypeBytes = $this->gridDataType === 'n' ? 2 : 4;
        $recordLength = 4 + $this->numberOfColumns * $dataTypeBytes + 4;

        $this->gridFile->fseek($startBytes + $recordLength * $latitudeIndex);
        $rawRow = $this->gridFile->fread($recordLength);

        /** @var float[] $row */
        $row = $this->unpack("Gstartbuffer/{$this->gridDataType}{$this->numberOfColumns}lon/Gendbuffer", $rawRow);

        return new GridValues(
            $longitudeIndex * $this->columnGridInterval + $this->startX,
            $latitudeIndex * $this->rowGridInterval + $this->startY,
            [$row['lon' . ($longitudeIndex + 1)]]
        );
    }

    /**
     * @return array{xlatsw: float, xlonsw: float, dlat: float, dlon: float, nlat: int, nlon: int, ikind: int}
     */
    private function getHeader(): array
    {
        $this->gridFile->fseek(0);
        $rawData = $this->gridFile->fread(52);
        /** @var array{xlatsw: float, xlonsw: float, dlat: float, dlon: float, nlat: int, nlon: int, ikind: int} $data */
        $data = $this->unpack('Gstartbuffer/Exlatsw/Exlonsw/Edlat/Edlon/Nnlat/Nnlon/Nikind/Gendbuffer/', $rawData);

        return $data;
    }

    /**
     * @return float[]
     */
    public function getValues(float $x, float $y): array
    {
        if ($x < 0) {
            $x += 360; // NADCON5 uses 0 = 360 = Greenwich
        }

        return $this->interpolate($x, $y);
    }
}
