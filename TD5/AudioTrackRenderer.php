<?php
namespace iutnc\deefy\render;

use iutnc\deefy\audio\tracks\AudioTrack;

require_once 'Renderer.php';


abstract class AudioTrackRenderer implements Renderer {
    protected AudioTrack $track;

    public function __construct(AudioTrack $track) {
        $this->track = $track;
    }

    public function render(int $selector): string {
        switch ($selector) {
            case self::COMPACT:
                return $this->renderCompact();
            case self::LONG:
                return $this->renderLong();
            default:
                return "<p>Mode inconnu</p>";
        }
    }

    abstract protected function renderCompact(): string;
    abstract protected function renderLong(): string;
}