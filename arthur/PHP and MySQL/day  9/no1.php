<head>
    <title>PHP Chessboard</title>
    <style>
        .chessboard {
            width: 400px;
            height: 400px;
            border: 4px solid #333;
            border-collapse: collapse;
            user-select: none;
        }

        .chessboard td {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 32px;
            line-height: 50px;
            cursor: pointer;
        }

        .white-cell { background-color: #f0d9b5; }
        .black-cell { background-color: #b58863; }
        .selected { background-color: #7fffd4 !important; }
        .chessboard td:hover { opacity: 0.9; }
    </style>
</head>
<body>

<table class="chessboard">
  <?php
  $pieces = [
      '1,1'=>'♜', '1,2'=>'♞', '1,3'=>'♝', '1,4'=>'♛', '1,5'=>'♚', '1,6'=>'♝', '1,7'=>'♞', '1,8'=>'♜',
      '2,1'=>'♟', '2,2'=>'♟', '2,3'=>'♟', '2,4'=>'♟', '2,5'=>'♟', '2,6'=>'♟', '2,7'=>'♟', '2,8'=>'♟',
      '7,1'=>'♙', '7,2'=>'♙', '7,3'=>'♙', '7,4'=>'♙', '7,5'=>'♙', '7,6'=>'♙', '7,7'=>'♙', '7,8'=>'♙',
      '8,1'=>'♖', '8,2'=>'♘', '8,3'=>'♗', '8,4'=>'♕', '8,5'=>'♔', '8,6'=>'♗', '8,7'=>'♘', '8,8'=>'♖'
  ];

  for ($row = 1; $row <= 8; $row++) {
      echo "<tr>";
      for ($col = 1; $col <= 8; $col++) {
          $total = $row + $col;
          $cellClass = ($total % 2 === 0) ? 'white-cell' : 'black-cell';
          $coord = "$row,$col";
          $currentPiece = isset($pieces[$coord]) ? $pieces[$coord] : '';
          echo "<td class='$cellClass' data-row='$row' data-col='$col'>" . $currentPiece . "</td>";
      }
      echo "</tr>";
  }
  ?>
</table>

<script>
    let selectedCell = null;
    const board = document.querySelector('.chessboard');

    board.addEventListener('click', function(e) {
        const cell = e.target;
        if (cell.tagName !== 'TD') return;

        const hasPiece = cell.textContent.trim() !== '';

        if (!selectedCell) {
            if (!hasPiece) return;
            selectedCell = cell;
            cell.classList.add('selected');
            return;
        }

        if (selectedCell === cell) {
            selectedCell.classList.remove('selected');
            selectedCell = null;
            return;
        }

        cell.textContent = selectedCell.textContent;
        selectedCell.textContent = '';
        selectedCell.classList.remove('selected');
        selectedCell = null;
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && selectedCell) {
            selectedCell.classList.remove('selected');
            selectedCell = null;
        }
    });
</script>


</body>
</html>
